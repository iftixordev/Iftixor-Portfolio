<!-- Hero Section -->
<section class="gradient-bg min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="animate-fade-in">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                Salom, men <span class="text-yellow-300">Iftixor</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200">
                Backend Developer & API Mutaxassisi
            </p>
            <p class="text-lg mb-12 max-w-3xl mx-auto text-gray-300">
                PHP, Node.js, MySQL va zamonaviy texnologiyalar yordamida 
                kuchli backend tizimlar va RESTful API'lar yarataman
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/projects" class="bg-blue-500 hover:bg-blue-600 px-8 py-3 rounded-lg font-medium transition">
                    <i class="fas fa-code mr-2"></i>Loyihalarim
                </a>
                <a href="/contact" class="border border-blue-500 text-blue-300 hover:bg-blue-500 hover:text-white px-8 py-3 rounded-lg font-medium transition">
                    <i class="fas fa-envelope mr-2"></i>Bog'lanish
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="py-20 bg-gray-800">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Texnik Ko'nikmalar</h2>
            <p class="text-gray-400 text-lg">Men ishlagan texnologiyalar</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $skills = [
                ['name' => 'PHP', 'level' => 95, 'icon' => 'fab fa-php'],
                ['name' => 'MySQL', 'level' => 90, 'icon' => 'fas fa-database'],
                ['name' => 'JavaScript', 'level' => 85, 'icon' => 'fab fa-js'],
                ['name' => 'Laravel', 'level' => 88, 'icon' => 'fab fa-laravel'],
                ['name' => 'Node.js', 'level' => 80, 'icon' => 'fab fa-node-js'],
                ['name' => 'Docker', 'level' => 75, 'icon' => 'fab fa-docker']
            ];

            foreach($skills as $skill): ?>
                <div class="bg-gray-700 p-6 rounded-lg card-hover">
                    <div class="flex items-center mb-4">
                        <i class="<?= $skill['icon'] ?> text-3xl text-blue-400 mr-3"></i>
                        <h3 class="text-xl font-semibold"><?= $skill['name'] ?></h3>
                    </div>
                    <div class="w-full bg-gray-600 rounded-full h-2 mb-2">
                        <div class="bg-blue-400 h-2 rounded-full" style="width: <?= $skill['level'] ?>%"></div>
                    </div>
                    <p class="text-gray-400"><?= $skill['level'] ?>%</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Latest Projects -->
<section class="py-20 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">So'nggi Loyihalar</h2>
            <p class="text-gray-400 text-lg">Men yaratgan ba'zi loyihalar</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $projects = [
                [
                    'title' => 'E-commerce API',
                    'description' => 'To\'liq funksional e-commerce backend tizimi',
                    'tech' => ['PHP', 'MySQL', 'JWT'],
                    'image' => 'https://via.placeholder.com/400x250'
                ],
                [
                    'title' => 'Blog CMS',
                    'description' => 'Kontent boshqaruv tizimi',
                    'tech' => ['Laravel', 'Vue.js', 'MySQL'],
                    'image' => 'https://via.placeholder.com/400x250'
                ],
                [
                    'title' => 'Task Manager',
                    'description' => 'Vazifalar boshqaruv dasturi',
                    'tech' => ['Node.js', 'MongoDB', 'Socket.io'],
                    'image' => 'https://via.placeholder.com/400x250'
                ]
            ];

            foreach($projects as $project): ?>
                <div class="bg-gray-800 rounded-lg overflow-hidden card-hover">
                    <img src="<?= $project['image'] ?>" alt="<?= $project['title'] ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2"><?= $project['title'] ?></h3>
                        <p class="text-gray-400 mb-4"><?= $project['description'] ?></p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach($project['tech'] as $tech): ?>
                                <span class="bg-blue-500 text-xs px-2 py-1 rounded"><?= $tech ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="flex space-x-4">
                            <a href="#" class="text-blue-400 hover:text-blue-300">
                                <i class="fab fa-github mr-1"></i>GitHub
                            </a>
                            <a href="#" class="text-blue-400 hover:text-blue-300">
                                <i class="fas fa-external-link-alt mr-1"></i>Demo
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-12">
            <a href="/projects" class="bg-blue-500 hover:bg-blue-600 px-8 py-3 rounded-lg font-medium transition">
                Barcha loyihalarni ko'rish
            </a>
        </div>
    </div>
</section>