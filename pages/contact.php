<?php
$message = '';
$error = '';

if ($_POST) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $msg = trim($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($msg)) {
        $error = 'Iltimos, barcha majburiy maydonlarni to\'ldiring!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email manzil noto\'g\'ri formatda!';
    } else {
        // Save to file or database
        $contact_data = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $msg,
            'date' => date('Y-m-d H:i:s')
        ];
        
        // Simple file storage
        $contacts_file = 'data/contacts.json';
        if (!file_exists('data')) {
            mkdir('data', 0755, true);
        }
        
        $contacts = [];
        if (file_exists($contacts_file)) {
            $contacts = json_decode(file_get_contents($contacts_file), true) ?? [];
        }
        
        $contacts[] = $contact_data;
        file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT));
        
        $message = 'Xabaringiz muvaffaqiyatli yuborildi! Tez orada javob beraman.';
        
        // Clear form
        $_POST = [];
    }
}
?>

<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4">Bog'lanish</h1>
            <p class="text-gray-400 text-lg">Loyiha bo'yicha takliflar yoki hamkorlik uchun bog'laning</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div>
                <h2 class="text-2xl font-bold mb-8">Aloqa ma'lumotlari</h2>
                
                <div class="space-y-6">
                    <div class="flex items-center">
                        <div class="bg-blue-500 p-3 rounded-lg mr-4">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Email</h3>
                            <p class="text-gray-400">iftixor@example.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="bg-blue-500 p-3 rounded-lg mr-4">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Telefon</h3>
                            <p class="text-gray-400">+998 90 123 45 67</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="bg-blue-500 p-3 rounded-lg mr-4">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Manzil</h3>
                            <p class="text-gray-400">Toshkent, O'zbekiston</p>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mt-12">
                    <h3 class="text-xl font-semibold mb-6">Ijtimoiy tarmoqlar</h3>
                    <div class="flex space-x-4">
                        <a href="https://github.com/iftixor" class="bg-gray-700 hover:bg-gray-600 p-3 rounded-lg transition">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="https://linkedin.com/in/iftixor" class="bg-gray-700 hover:bg-gray-600 p-3 rounded-lg transition">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="https://t.me/iftixor" class="bg-gray-700 hover:bg-gray-600 p-3 rounded-lg transition">
                            <i class="fab fa-telegram text-xl"></i>
                        </a>
                        <a href="https://twitter.com/iftixor" class="bg-gray-700 hover:bg-gray-600 p-3 rounded-lg transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Availability -->
                <div class="mt-12 bg-gray-800 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-4">Mavjudlik</h3>
                    <div class="flex items-center mb-2">
                        <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                        <span>Yangi loyihalar uchun mavjud</span>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Hozirda freelance loyihalar va to'liq vaqtli ish takliflari qabul qilmoqdaman
                    </p>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <h2 class="text-2xl font-bold mb-8">Xabar yuborish</h2>
                
                <?php if ($message): ?>
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                        <i class="fas fa-check-circle mr-2"></i><?= $message ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                        <i class="fas fa-exclamation-circle mr-2"></i><?= $error ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Ism *</label>
                            <input 
                                type="text" 
                                name="name" 
                                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500"
                                required
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email *</label>
                            <input 
                                type="email" 
                                name="email" 
                                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500"
                                required
                            >
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-2">Mavzu</label>
                        <input 
                            type="text" 
                            name="subject" 
                            value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>"
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-2">Xabar *</label>
                        <textarea 
                            name="message" 
                            rows="6" 
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500"
                            required
                        ><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-600 py-3 rounded-lg font-medium transition"
                    >
                        <i class="fas fa-paper-plane mr-2"></i>Xabar yuborish
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-gray-800">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Tez-tez so'raladigan savollar</h2>
            <p class="text-gray-400">Eng ko'p so'raladigan savollar va javoblar</p>
        </div>

        <div class="space-y-4">
            <?php
            $faqs = [
                [
                    'question' => 'Qanday texnologiyalar bilan ishlaysiz?',
                    'answer' => 'Asosan PHP, Node.js, MySQL, Redis, Docker va zamonaviy backend texnologiyalar bilan ishlayman.'
                ],
                [
                    'question' => 'Loyiha qancha vaqt oladi?',
                    'answer' => 'Bu loyihaning murakkabligiga bog\'liq. Oddiy API 1-2 hafta, murakkab tizimlar 1-3 oy vaqt olishi mumkin.'
                ],
                [
                    'question' => 'Narxlar qanday?',
                    'answer' => 'Narxlar loyihaning hajmi va murakkabligiga qarab belgilanadi. Batafsil ma\'lumot uchun bog\'laning.'
                ],
                [
                    'question' => 'Qo\'llab-quvvatlash xizmati bormi?',
                    'answer' => 'Ha, loyiha tugagandan keyin 3 oy bepul qo\'llab-quvvatlash va texnik yordam beraman.'
                ]
            ];

            foreach($faqs as $index => $faq): ?>
                <div class="bg-gray-700 rounded-lg">
                    <button class="faq-btn w-full text-left p-6 focus:outline-none" data-target="faq-<?= $index ?>">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold"><?= $faq['question'] ?></h3>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </div>
                    </button>
                    <div id="faq-<?= $index ?>" class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-400"><?= $faq['answer'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
// FAQ Toggle
document.querySelectorAll('.faq-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const target = document.getElementById(this.getAttribute('data-target'));
        const icon = this.querySelector('i');
        
        if (target.classList.contains('hidden')) {
            target.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
        } else {
            target.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    });
});
</script>