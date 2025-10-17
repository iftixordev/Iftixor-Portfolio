<?php
$settings_file = '../data/settings.json';
$message = '';
$error = '';

// Default settings
$default_settings = [
    'site_title' => 'Iftixor Portfolio',
    'site_description' => 'Backend Developer Portfolio',
    'admin_email' => 'admin@example.com',
    'contact_email' => 'iftixor@example.com',
    'phone' => '+998 90 123 45 67',
    'address' => 'Toshkent, O\'zbekiston',
    'github_url' => 'https://github.com/iftixor',
    'linkedin_url' => 'https://linkedin.com/in/iftixor',
    'telegram_url' => 'https://t.me/iftixor',
    'twitter_url' => 'https://twitter.com/iftixor'
];

// Load settings
$settings = $default_settings;
if (file_exists($settings_file)) {
    $saved_settings = json_decode(file_get_contents($settings_file), true);
    if ($saved_settings) {
        $settings = array_merge($default_settings, $saved_settings);
    }
}

// Handle form submission
if ($_POST) {
    $new_settings = [];
    foreach ($default_settings as $key => $default_value) {
        $new_settings[$key] = trim($_POST[$key] ?? $default_value);
    }
    
    // Ensure data directory exists
    if (!file_exists('../data')) {
        mkdir('../data', 0755, true);
    }
    
    if (file_put_contents($settings_file, json_encode($new_settings, JSON_PRETTY_PRINT))) {
        $settings = $new_settings;
        $message = 'Sozlamalar muvaffaqiyatli saqlandi!';
    } else {
        $error = 'Sozlamalarni saqlashda xatolik yuz berdi!';
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

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- General Settings -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold">Umumiy sozlamalar</h3>
        </div>
        
        <form method="POST" class="p-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sayt nomi</label>
                    <input type="text" name="site_title" value="<?= htmlspecialchars($settings['site_title']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sayt tavsifi</label>
                    <textarea name="site_description" rows="3" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"><?= htmlspecialchars($settings['site_description']) ?></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Admin email</label>
                    <input type="email" name="admin_email" value="<?= htmlspecialchars($settings['admin_email']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
            </div>
            
            <h4 class="text-md font-semibold mt-8 mb-4">Aloqa ma'lumotlari</h4>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Aloqa email</label>
                    <input type="email" name="contact_email" value="<?= htmlspecialchars($settings['contact_email']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Telefon</label>
                    <input type="text" name="phone" value="<?= htmlspecialchars($settings['phone']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Manzil</label>
                    <input type="text" name="address" value="<?= htmlspecialchars($settings['address']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
            </div>
            
            <h4 class="text-md font-semibold mt-8 mb-4">Ijtimoiy tarmoqlar</h4>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">GitHub URL</label>
                    <input type="url" name="github_url" value="<?= htmlspecialchars($settings['github_url']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="<?= htmlspecialchars($settings['linkedin_url']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Telegram URL</label>
                    <input type="url" name="telegram_url" value="<?= htmlspecialchars($settings['telegram_url']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Twitter URL</label>
                    <input type="url" name="twitter_url" value="<?= htmlspecialchars($settings['twitter_url']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
            </div>
            
            <div class="mt-8">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Saqlash
                </button>
            </div>
        </form>
    </div>
    
    <!-- System Info -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold">Tizim ma'lumotlari</h3>
        </div>
        
        <div class="p-6 space-y-4">
            <div class="flex justify-between">
                <span class="text-gray-600">PHP versiyasi:</span>
                <span class="font-medium"><?= phpversion() ?></span>
            </div>
            
            <div class="flex justify-between">
                <span class="text-gray-600">Server:</span>
                <span class="font-medium"><?= $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' ?></span>
            </div>
            
            <div class="flex justify-between">
                <span class="text-gray-600">Disk bo'sh joyi:</span>
                <span class="font-medium"><?= round(disk_free_space('.') / 1024 / 1024 / 1024, 2) ?> GB</span>
            </div>
            
            <div class="flex justify-between">
                <span class="text-gray-600">Xotira limiti:</span>
                <span class="font-medium"><?= ini_get('memory_limit') ?></span>
            </div>
            
            <div class="flex justify-between">
                <span class="text-gray-600">Fayl yuklash limiti:</span>
                <span class="font-medium"><?= ini_get('upload_max_filesize') ?></span>
            </div>
        </div>
    </div>
</div>

<!-- Backup & Maintenance -->
<div class="bg-white rounded-lg shadow mt-6">
    <div class="p-6 border-b">
        <h3 class="text-lg font-semibold">Backup va texnik xizmat</h3>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <button onclick="backupData()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-download mr-2"></i>Ma'lumotlarni yuklab olish
            </button>
            
            <button onclick="clearCache()" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-broom mr-2"></i>Keshni tozalash
            </button>
            
            <button onclick="viewLogs()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-file-alt mr-2"></i>Loglarni ko'rish
            </button>
        </div>
    </div>
</div>

<script>
function backupData() {
    if (confirm('Barcha ma\'lumotlarni yuklab olmoqchimisiz?')) {
        window.location.href = 'backup.php';
    }
}

function clearCache() {
    if (confirm('Keshni tozalamoqchimisiz?')) {
        alert('Kesh tozalandi!');
    }
}

function viewLogs() {
    window.open('logs.php', '_blank');
}
</script>