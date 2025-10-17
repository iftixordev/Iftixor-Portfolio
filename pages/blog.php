<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4">Blog</h1>
            <p class="text-gray-400 text-lg">Backend development haqida maqolalar va maslahatlar</p>
        </div>

        <!-- Featured Article -->
        <div class="bg-gray-800 rounded-lg overflow-hidden mb-12">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <img src="https://via.placeholder.com/600x400" alt="Featured" class="w-full h-64 lg:h-full object-cover">
                <div class="p-8">
                    <span class="bg-blue-500 text-xs px-3 py-1 rounded-full">Asosiy maqola</span>
                    <h2 class="text-2xl font-bold mt-4 mb-4">PHP 8.3 da yangi imkoniyatlar va performance yaxshilanishlari</h2>
                    <p class="text-gray-400 mb-6">PHP 8.3 versiyasida qo'shilgan yangi xususiyatlar, performance optimizatsiyalari va backend development uchun foydali yangiliklar haqida batafsil ma'lumot...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/40x40" alt="Author" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <p class="font-medium">Iftixor</p>
                                <p class="text-gray-400 text-sm">15 Dekabr, 2024</p>
                            </div>
                        </div>
                        <a href="/blog/php-8-3-features" class="text-blue-400 hover:text-blue-300">
                            O'qish <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $posts = [
                [
                    'title' => 'RESTful API yaratishda eng yaxshi amaliyotlar',
                    'excerpt' => 'Zamonaviy RESTful API yaratish uchun asosiy qoidalar va best practice\'lar',
                    'date' => '10 Dekabr, 2024',
                    'category' => 'API',
                    'image' => 'https://via.placeholder.com/400x250',
                    'slug' => 'restful-api-best-practices'
                ],
                [
                    'title' => 'MySQL Performance Optimization',
                    'excerpt' => 'Ma\'lumotlar bazasi tezligini oshirish uchun amaliy maslahatlar',
                    'date' => '5 Dekabr, 2024',
                    'category' => 'Database',
                    'image' => 'https://via.placeholder.com/400x250',
                    'slug' => 'mysql-performance-tips'
                ],
                [
                    'title' => 'Docker bilan PHP Development Environment',
                    'excerpt' => 'Docker yordamida PHP development muhitini sozlash',
                    'date' => '1 Dekabr, 2024',
                    'category' => 'DevOps',
                    'image' => 'https://via.placeholder.com/400x250',
                    'slug' => 'docker-php-environment'
                ],
                [
                    'title' => 'JWT Authentication PHP da',
                    'excerpt' => 'JSON Web Token yordamida xavfsiz autentifikatsiya tizimi yaratish',
                    'date' => '28 Noyabr, 2024',
                    'category' => 'Security',
                    'image' => 'https://via.placeholder.com/400x250',
                    'slug' => 'jwt-authentication-php'
                ],
                [
                    'title' => 'Microservices Architecture bilan tanishish',
                    'excerpt' => 'Mikroservis arxitekturasining afzalliklari va qo\'llash usullari',
                    'date' => '25 Noyabr, 2024',
                    'category' => 'Architecture',
                    'image' => 'https://via.placeholder.com/400x250',
                    'slug' => 'microservices-introduction'
                ],
                [
                    'title' => 'Redis Cache strategiyalari',
                    'excerpt' => 'Redis yordamida samarali caching tizimi yaratish',
                    'date' => '20 Noyabr, 2024',
                    'category' => 'Performance',
                    'image' => 'https://via.placeholder.com/400x250',
                    'slug' => 'redis-caching-strategies'
                ]
            ];

            foreach($posts as $post): ?>
                <article class="bg-gray-800 rounded-lg overflow-hidden card-hover">
                    <img src="<?= $post['image'] ?>" alt="<?= $post['title'] ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-blue-500 text-xs px-2 py-1 rounded"><?= $post['category'] ?></span>
                            <span class="text-gray-400 text-sm"><?= $post['date'] ?></span>
                        </div>
                        <h3 class="text-lg font-semibold mb-3 hover:text-blue-400 transition">
                            <a href="/blog/<?= $post['slug'] ?>"><?= $post['title'] ?></a>
                        </h3>
                        <p class="text-gray-400 text-sm mb-4"><?= $post['excerpt'] ?></p>
                        <a href="/blog/<?= $post['slug'] ?>" class="text-blue-400 hover:text-blue-300 text-sm">
                            Batafsil o'qish <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav class="flex space-x-2">
                <a href="#" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 transition">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="px-4 py-2 bg-blue-500 rounded-lg">1</a>
                <a href="#" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 transition">2</a>
                <a href="#" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 transition">3</a>
                <a href="#" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 transition">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>
</section>

<!-- Newsletter Subscription -->
<section class="py-16 bg-gray-800">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Yangiliklar uchun obuna bo'ling</h2>
        <p class="text-gray-400 mb-8">Backend development haqida yangi maqolalar va maslahatlarni birinchi bo'lib oling</p>
        
        <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
            <input 
                type="email" 
                placeholder="Email manzilingiz" 
                class="flex-1 px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500"
                required
            >
            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg font-medium transition"
            >
                Obuna bo'lish
            </button>
        </form>
    </div>
</section>