<section class="py-20 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4">Mening Loyihalarim</h1>
            <p class="text-gray-400 text-lg">Men yaratgan backend loyihalar va API'lar</p>
        </div>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="filter-btn active bg-blue-500 px-6 py-2 rounded-lg" data-filter="all">
                Barchasi
            </button>
            <button class="filter-btn bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded-lg" data-filter="php">
                PHP
            </button>
            <button class="filter-btn bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded-lg" data-filter="nodejs">
                Node.js
            </button>
            <button class="filter-btn bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded-lg" data-filter="api">
                API
            </button>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $projects = [
                [
                    'title' => 'E-commerce Backend API',
                    'description' => 'To\'liq funksional e-commerce backend tizimi JWT autentifikatsiya, to\'lov integratsiyasi va admin panel bilan',
                    'tech' => ['PHP', 'MySQL', 'Redis', 'JWT', 'Stripe API'],
                    'category' => 'php api',
                    'github' => 'https://github.com/iftixor/ecommerce-api',
                    'demo' => 'https://demo.example.com',
                    'image' => 'https://via.placeholder.com/400x250'
                ],
                [
                    'title' => 'Task Management API',
                    'description' => 'Real-time bildirishnomalar va jamoa hamkorligi imkoniyatlari bilan vazifalar boshqaruv tizimi',
                    'tech' => ['Node.js', 'Express', 'MongoDB', 'Socket.io'],
                    'category' => 'nodejs api',
                    'github' => 'https://github.com/iftixor/task-api',
                    'demo' => null,
                    'image' => 'https://via.placeholder.com/400x250'
                ],
                [
                    'title' => 'Blog CMS Backend',
                    'description' => 'Ko\'p tilli qo\'llab-quvvatlash, SEO optimallashtirish va rivojlangan admin panel bilan kontent boshqaruv tizimi',
                    'tech' => ['PHP', 'Laravel', 'MySQL', 'Redis'],
                    'category' => 'php',
                    'github' => 'https://github.com/iftixor/blog-cms',
                    'demo' => 'https://blog.example.com',
                    'image' => 'https://via.placeholder.com/400x250'
                ],
                [
                    'title' => 'Microservices Architecture',
                    'description' => 'Docker, API Gateway va service discovery bilan kengaytirilishi mumkin bo\'lgan mikroservis arxitekturasi',
                    'tech' => ['Docker', 'Nginx', 'PHP', 'Node.js', 'Redis'],
                    'category' => 'php nodejs',
                    'github' => 'https://github.com/iftixor/microservices',
                    'demo' => null,
                    'image' => 'https://via.placeholder.com/400x250'
                ],
                [
                    'title' => 'Real-time Chat API',
                    'description' => 'WebSocket texnologiyasi bilan real-time chat tizimi, fayllar almashish va guruh chat imkoniyatlari',
                    'tech' => ['Node.js', 'Socket.io', 'MongoDB', 'JWT'],
                    'category' => 'nodejs api',
                    'github' => 'https://github.com/iftixor/chat-api',
                    'demo' => 'https://chat.example.com',
                    'image' => 'https://via.placeholder.com/400x250'
                ],
                [
                    'title' => 'Payment Gateway Integration',
                    'description' => 'Turli to\'lov tizimlari bilan integratsiya, xavfsiz tranzaksiyalar va to\'lov hisobotlari',
                    'tech' => ['PHP', 'Laravel', 'MySQL', 'Stripe', 'PayPal'],
                    'category' => 'php api',
                    'github' => 'https://github.com/iftixor/payment-gateway',
                    'demo' => null,
                    'image' => 'https://via.placeholder.com/400x250'
                ]
            ];

            foreach($projects as $project): ?>
                <div class="project-card bg-gray-800 rounded-lg overflow-hidden card-hover" data-category="<?= $project['category'] ?>">
                    <img src="<?= $project['image'] ?>" alt="<?= $project['title'] ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3"><?= $project['title'] ?></h3>
                        <p class="text-gray-400 mb-4 text-sm leading-relaxed"><?= $project['description'] ?></p>
                        
                        <!-- Technologies -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach($project['tech'] as $tech): ?>
                                <span class="bg-blue-500 text-xs px-2 py-1 rounded"><?= $tech ?></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <!-- Links -->
                        <div class="flex space-x-4">
                            <a href="<?= $project['github'] ?>" target="_blank" class="text-blue-400 hover:text-blue-300 transition">
                                <i class="fab fa-github mr-1"></i>GitHub
                            </a>
                            <?php if($project['demo']): ?>
                                <a href="<?= $project['demo'] ?>" target="_blank" class="text-blue-400 hover:text-blue-300 transition">
                                    <i class="fas fa-external-link-alt mr-1"></i>Demo
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
// Project filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active', 'bg-blue-500'));
            filterBtns.forEach(b => b.classList.add('bg-gray-700'));
            this.classList.add('active', 'bg-blue-500');
            this.classList.remove('bg-gray-700');
            
            // Filter projects
            projectCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category').includes(filter)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>