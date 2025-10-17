<?php
$blog_file = '../data/blog.json';
$action = $_GET['action'] ?? 'list';
$message = '';
$error = '';

// Ensure data directory exists
if (!file_exists('../data')) {
    mkdir('../data', 0755, true);
}

// Load blog posts
$posts = [];
if (file_exists($blog_file)) {
    $posts = json_decode(file_get_contents($blog_file), true) ?? [];
}

// Handle form submissions
if ($_POST) {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $excerpt = trim($_POST['excerpt'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $image_url = trim($_POST['image_url'] ?? '');
    $status = $_POST['status'] ?? 'draft';
    
    if (empty($title) || empty($content)) {
        $error = 'Sarlavha va kontent majburiy!';
    } else {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
        
        $post_data = [
            'id' => $_POST['id'] ?? uniqid(),
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'excerpt' => $excerpt ?: substr(strip_tags($content), 0, 150) . '...',
            'category' => $category,
            'image_url' => $image_url ?: 'https://via.placeholder.com/600x400',
            'status' => $status,
            'created_at' => $_POST['created_at'] ?? date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($action === 'add') {
            $posts[] = $post_data;
            $message = 'Post muvaffaqiyatli qo\'shildi!';
        } elseif ($action === 'edit') {
            $id = $_POST['id'];
            foreach ($posts as &$post) {
                if ($post['id'] === $id) {
                    $post = $post_data;
                    break;
                }
            }
            $message = 'Post muvaffaqiyatli yangilandi!';
        }
        
        file_put_contents($blog_file, json_encode($posts, JSON_PRETTY_PRINT));
        $action = 'list';
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $posts = array_filter($posts, function($post) use ($id) {
        return $post['id'] !== $id;
    });
    file_put_contents($blog_file, json_encode(array_values($posts), JSON_PRETTY_PRINT));
    $message = 'Post o\'chirildi!';
    $action = 'list';
}

// Get post for editing
$edit_post = null;
if ($action === 'edit' && isset($_GET['id'])) {
    foreach ($posts as $post) {
        if ($post['id'] === $_GET['id']) {
            $edit_post = $post;
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
    <!-- Blog Posts List -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold">Blog postlar</h3>
            <a href="?page=blog&action=add" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                <i class="fas fa-plus mr-2"></i>Yangi post
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Post</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategoriya</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sana</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amallar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($posts)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Hozircha postlar yo'q
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="<?= $post['image_url'] ?>" alt="" class="w-12 h-12 rounded object-cover mr-4">
                                        <div>
                                            <p class="font-medium"><?= htmlspecialchars($post['title']) ?></p>
                                            <p class="text-sm text-gray-600"><?= htmlspecialchars(substr($post['excerpt'], 0, 50)) ?>...</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                        <?= htmlspecialchars($post['category']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="<?= $post['status'] === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?> text-xs px-2 py-1 rounded">
                                        <?= $post['status'] === 'published' ? 'Nashr etilgan' : 'Qoralama' ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <?= date('d.m.Y', strtotime($post['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="?page=blog&action=edit&id=<?= $post['id'] ?>" class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?page=blog&delete=<?= $post['id'] ?>" 
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
                <?= $action === 'add' ? 'Yangi post yozish' : 'Postni tahrirlash' ?>
            </h3>
        </div>
        
        <form method="POST" class="p-6">
            <?php if ($edit_post): ?>
                <input type="hidden" name="id" value="<?= $edit_post['id'] ?>">
                <input type="hidden" name="created_at" value="<?= $edit_post['created_at'] ?>">
            <?php endif; ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sarlavha *</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($edit_post['title'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategoriya</label>
                    <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="">Kategoriya tanlang</option>
                        <option value="PHP" <?= ($edit_post['category'] ?? '') === 'PHP' ? 'selected' : '' ?>>PHP</option>
                        <option value="JavaScript" <?= ($edit_post['category'] ?? '') === 'JavaScript' ? 'selected' : '' ?>>JavaScript</option>
                        <option value="Database" <?= ($edit_post['category'] ?? '') === 'Database' ? 'selected' : '' ?>>Database</option>
                        <option value="API" <?= ($edit_post['category'] ?? '') === 'API' ? 'selected' : '' ?>>API</option>
                        <option value="DevOps" <?= ($edit_post['category'] ?? '') === 'DevOps' ? 'selected' : '' ?>>DevOps</option>
                        <option value="Tutorial" <?= ($edit_post['category'] ?? '') === 'Tutorial' ? 'selected' : '' ?>>Tutorial</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="draft" <?= ($edit_post['status'] ?? 'draft') === 'draft' ? 'selected' : '' ?>>Qoralama</option>
                        <option value="published" <?= ($edit_post['status'] ?? '') === 'published' ? 'selected' : '' ?>>Nashr etish</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rasm URL</label>
                    <input type="url" name="image_url" value="<?= htmlspecialchars($edit_post['image_url'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Qisqacha mazmun</label>
                <textarea name="excerpt" rows="3" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                          placeholder="Avtomatik yaratiladi agar bo'sh qoldirilsa"><?= htmlspecialchars($edit_post['excerpt'] ?? '') ?></textarea>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Kontent *</label>
                <textarea name="content" rows="15" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                          required><?= htmlspecialchars($edit_post['content'] ?? '') ?></textarea>
                <p class="text-sm text-gray-500 mt-1">HTML teglar ishlatishingiz mumkin</p>
            </div>
            
            <div class="flex justify-end space-x-4">
                <a href="?page=blog" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Bekor qilish
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    <?= $action === 'add' ? 'Qo\'shish' : 'Yangilash' ?>
                </button>
            </div>
        </form>
    </div>
<?php endif; ?>