<?php
$projects_file = '../data/projects.json';
$action = $_GET['action'] ?? 'list';
$message = '';
$error = '';

// Ensure data directory exists
if (!file_exists('../data')) {
    mkdir('../data', 0755, true);
}

// Load projects
$projects = [];
if (file_exists($projects_file)) {
    $projects = json_decode(file_get_contents($projects_file), true) ?? [];
}

// Handle form submissions
if ($_POST) {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $technologies = array_filter(array_map('trim', explode(',', $_POST['technologies'] ?? '')));
    $github_url = trim($_POST['github_url'] ?? '');
    $demo_url = trim($_POST['demo_url'] ?? '');
    $image_url = trim($_POST['image_url'] ?? '');
    
    if (empty($title) || empty($description)) {
        $error = 'Sarlavha va tavsif majburiy!';
    } else {
        $project_data = [
            'id' => $_POST['id'] ?? uniqid(),
            'title' => $title,
            'description' => $description,
            'technologies' => $technologies,
            'github_url' => $github_url,
            'demo_url' => $demo_url,
            'image_url' => $image_url ?: 'https://via.placeholder.com/400x250',
            'created_at' => $_POST['created_at'] ?? date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($action === 'add') {
            $projects[] = $project_data;
            $message = 'Loyiha muvaffaqiyatli qo\'shildi!';
        } elseif ($action === 'edit') {
            $id = $_POST['id'];
            foreach ($projects as &$project) {
                if ($project['id'] === $id) {
                    $project = $project_data;
                    break;
                }
            }
            $message = 'Loyiha muvaffaqiyatli yangilandi!';
        }
        
        file_put_contents($projects_file, json_encode($projects, JSON_PRETTY_PRINT));
        $action = 'list';
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $projects = array_filter($projects, function($project) use ($id) {
        return $project['id'] !== $id;
    });
    file_put_contents($projects_file, json_encode(array_values($projects), JSON_PRETTY_PRINT));
    $message = 'Loyiha o\'chirildi!';
    $action = 'list';
}

// Get project for editing
$edit_project = null;
if ($action === 'edit' && isset($_GET['id'])) {
    foreach ($projects as $project) {
        if ($project['id'] === $_GET['id']) {
            $edit_project = $project;
            break;
        }
    }
}
?>

<?php if ($message): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?= $message ?>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php if ($action === 'list'): ?>
    <!-- Projects List -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold">Loyihalar ro'yxati</h3>
            <a href="?page=projects&action=add" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                <i class="fas fa-plus mr-2"></i>Yangi loyiha
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Loyiha</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Texnologiyalar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sana</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amallar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($projects)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Hozircha loyihalar yo'q
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="<?= $project['image_url'] ?>" alt="" class="w-12 h-12 rounded object-cover mr-4">
                                        <div>
                                            <p class="font-medium"><?= htmlspecialchars($project['title']) ?></p>
                                            <p class="text-sm text-gray-600"><?= htmlspecialchars(substr($project['description'], 0, 50)) ?>...</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-1">
                                        <?php foreach ($project['technologies'] as $tech): ?>
                                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded"><?= htmlspecialchars($tech) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <?= date('d.m.Y', strtotime($project['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="?page=projects&action=edit&id=<?= $project['id'] ?>" class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?page=projects&delete=<?= $project['id'] ?>" 
                                           onclick="return confirm('Rostdan ham o\'chirmoqchimisiz?')" 
                                           class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php else: ?>
    <!-- Add/Edit Form -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold">
                <?= $action === 'add' ? 'Yangi loyiha qo\'shish' : 'Loyihani tahrirlash' ?>
            </h3>
        </div>
        
        <form method="POST" class="p-6">
            <?php if ($edit_project): ?>
                <input type="hidden" name="id" value="<?= $edit_project['id'] ?>">
                <input type="hidden" name="created_at" value="<?= $edit_project['created_at'] ?>">
            <?php endif; ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Loyiha nomi *</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($edit_project['title'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Texnologiyalar (vergul bilan ajrating)</label>
                    <input type="text" name="technologies" value="<?= htmlspecialchars(implode(', ', $edit_project['technologies'] ?? [])) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           placeholder="PHP, MySQL, JavaScript">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">GitHub URL</label>
                    <input type="url" name="github_url" value="<?= htmlspecialchars($edit_project['github_url'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Demo URL</label>
                    <input type="url" name="demo_url" value="<?= htmlspecialchars($edit_project['demo_url'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rasm URL</label>
                    <input type="url" name="image_url" value="<?= htmlspecialchars($edit_project['image_url'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           placeholder="https://example.com/image.jpg">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tavsif *</label>
                    <textarea name="description" rows="4" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required><?= htmlspecialchars($edit_project['description'] ?? '') ?></textarea>
                </div>
            </div>
            
            <div class="flex justify-end space-x-4 mt-6">
                <a href="?page=projects" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Bekor qilish
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    <?= $action === 'add' ? 'Qo\'shish' : 'Yangilash' ?>
                </button>
            </div>
        </form>
    </div>
<?php endif; ?>