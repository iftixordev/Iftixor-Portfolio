<?php
$contacts_file = '../data/contacts.json';
$message = '';

// Load contacts
$contacts = [];
if (file_exists($contacts_file)) {
    $contacts = json_decode(file_get_contents($contacts_file), true) ?? [];
}

// Handle mark as read
if (isset($_GET['read'])) {
    $id = $_GET['read'];
    foreach ($contacts as &$contact) {
        if (isset($contact['id']) && $contact['id'] == $id) {
            $contact['status'] = 'read';
            break;
        }
    }
    file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT));
    $message = 'Xabar o\'qilgan deb belgilandi!';
}

// Handle delete
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($contacts[$index])) {
        unset($contacts[$index]);
        $contacts = array_values($contacts);
        file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT));
        $message = 'Xabar o\'chirildi!';
    }
}

// Add IDs to contacts if not present
foreach ($contacts as $index => &$contact) {
    if (!isset($contact['id'])) {
        $contact['id'] = $index;
    }
    if (!isset($contact['status'])) {
        $contact['status'] = 'new';
    }
}

// Reverse to show newest first
$contacts = array_reverse($contacts);
?>

<?php if ($message): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?= $message ?>
    </div>
<?php endif; ?>

<!-- Contacts List -->
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Kelgan xabarlar</h3>
            <div class="text-sm text-gray-600">
                Jami: <?= count($contacts) ?> ta xabar
            </div>
        </div>
    </div>
    
    <?php if (empty($contacts)): ?>
        <div class="p-12 text-center">
            <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
            <p class="text-gray-500">Hozircha xabarlar yo'q</p>
        </div>
    <?php else: ?>
        <div class="divide-y divide-gray-200">
            <?php foreach ($contacts as $index => $contact): ?>
                <div class="p-6 <?= ($contact['status'] ?? 'new') === 'new' ? 'bg-blue-50' : '' ?>">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gray-300 rounded-full p-2">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg"><?= htmlspecialchars($contact['name']) ?></h4>
                                <p class="text-gray-600"><?= htmlspecialchars($contact['email']) ?></p>
                                <?php if (!empty($contact['subject'])): ?>
                                    <p class="text-sm text-gray-500">Mavzu: <?= htmlspecialchars($contact['subject']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <?php if (($contact['status'] ?? 'new') === 'new'): ?>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Yangi</span>
                            <?php endif; ?>
                            <span class="text-sm text-gray-500"><?= date('d.m.Y H:i', strtotime($contact['date'])) ?></span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <p class="text-gray-800 leading-relaxed"><?= nl2br(htmlspecialchars($contact['message'])) ?></p>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <a href="mailto:<?= htmlspecialchars($contact['email']) ?>?subject=Re: <?= htmlspecialchars($contact['subject'] ?? 'Portfolio Contact') ?>" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                                <i class="fas fa-reply mr-1"></i>Javob berish
                            </a>
                            
                            <?php if (($contact['status'] ?? 'new') === 'new'): ?>
                                <a href="?page=contacts&read=<?= $contact['id'] ?>" 
                                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded text-sm">
                                    <i class="fas fa-check mr-1"></i>O'qilgan
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <a href="?page=contacts&delete=<?= array_search($contact, array_reverse($contacts)) ?>" 
                           onclick="return confirm('Rostdan ham o\'chirmoqchimisiz?')" 
                           class="text-red-600 hover:text-red-800 px-2 py-1">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Statistics -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-blue-500 p-3 rounded-lg">
                <i class="fas fa-envelope text-white"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Jami xabarlar</p>
                <p class="text-2xl font-semibold"><?= count($contacts) ?></p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-green-500 p-3 rounded-lg">
                <i class="fas fa-check text-white"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">O'qilgan</p>
                <p class="text-2xl font-semibold">
                    <?= count(array_filter($contacts, function($c) { return ($c['status'] ?? 'new') === 'read'; })) ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-yellow-500 p-3 rounded-lg">
                <i class="fas fa-clock text-white"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Yangi</p>
                <p class="text-2xl font-semibold">
                    <?= count(array_filter($contacts, function($c) { return ($c['status'] ?? 'new') === 'new'; })) ?>
                </p>
            </div>
        </div>
    </div>
</div>