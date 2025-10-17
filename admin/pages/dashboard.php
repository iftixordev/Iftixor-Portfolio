<?php
// Get statistics
$contacts_file = '../data/contacts.json';
$projects_file = '../data/projects.json';
$blog_file = '../data/blog.json';

$contacts_count = 0;
$projects_count = 0;
$blog_count = 0;

if (file_exists($contacts_file)) {
    $contacts = json_decode(file_get_contents($contacts_file), true) ?? [];
    $contacts_count = count($contacts);
}

if (file_exists($projects_file)) {
    $projects = json_decode(file_get_contents($projects_file), true) ?? [];
    $projects_count = count($projects);
}

if (file_exists($blog_file)) {
    $blog = json_decode(file_get_contents($blog_file), true) ?? [];
    $blog_count = count($blog);
}
?>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-blue-500 p-3 rounded-lg">
                <i class="fas fa-code text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Loyihalar</p>
                <p class="text-2xl font-semibold"><?= $projects_count ?></p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-green-500 p-3 rounded-lg">
                <i class="fas fa-blog text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Blog postlar</p>
                <p class="text-2xl font-semibold"><?= $blog_count ?></p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-yellow-500 p-3 rounded-lg">
                <i class="fas fa-envelope text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Xabarlar</p>
                <p class="text-2xl font-semibold"><?= $contacts_count ?></p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-purple-500 p-3 rounded-lg">
                <i class="fas fa-eye text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Ko'rishlar</p>
                <p class="text-2xl font-semibold">1,234</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Messages -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold">So'nggi xabarlar</h3>
        </div>
        <div class="p-6">
            <?php if (file_exists($contacts_file)): ?>
                <?php 
                $contacts = json_decode(file_get_contents($contacts_file), true) ?? [];
                $recent_contacts = array_slice(array_reverse($contacts), 0, 5);
                ?>
                <?php if (empty($recent_contacts)): ?>
                    <p class="text-gray-500">Hozircha xabarlar yo'q</p>
                <?php else: ?>
                    <div class="space-y-4">
                        <?php foreach($recent_contacts as $contact): ?>
                            <div class="flex items-start space-x-3">
                                <div class="bg-blue-100 p-2 rounded-full">
                                    <i class="fas fa-user text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium"><?= htmlspecialchars($contact['name']) ?></p>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars(substr($contact['message'], 0, 50)) ?>...</p>
                                    <p class="text-xs text-gray-400"><?= $contact['date'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <p class="text-gray-500">Xabarlar fayli topilmadi</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold">Tezkor amallar</h3>
        </div>
        <div class="p-6">
            <div class="space-y-3">
                <a href="?page=projects&action=add" class="block bg-blue-50 hover:bg-blue-100 p-4 rounded-lg transition">
                    <div class="flex items-center">
                        <i class="fas fa-plus text-blue-600 mr-3"></i>
                        <div>
                            <p class="font-medium">Yangi loyiha qo'shish</p>
                            <p class="text-sm text-gray-600">Portfolio ga yangi loyiha qo'shing</p>
                        </div>
                    </div>
                </a>

                <a href="?page=blog&action=add" class="block bg-green-50 hover:bg-green-100 p-4 rounded-lg transition">
                    <div class="flex items-center">
                        <i class="fas fa-edit text-green-600 mr-3"></i>
                        <div>
                            <p class="font-medium">Yangi blog post</p>
                            <p class="text-sm text-gray-600">Yangi maqola yozing</p>
                        </div>
                    </div>
                </a>

                <a href="?page=contacts" class="block bg-yellow-50 hover:bg-yellow-100 p-4 rounded-lg transition">
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-yellow-600 mr-3"></i>
                        <div>
                            <p class="font-medium">Xabarlarni ko'rish</p>
                            <p class="text-sm text-gray-600">Kelgan xabarlarni tekshiring</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>