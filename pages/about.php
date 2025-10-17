<section class="py-20 bg-gray-900">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4">Men Haqimda</h1>
            <p class="text-gray-400 text-lg">Backend Developer va API Mutaxassisi</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <img src="https://via.placeholder.com/400x500" alt="Iftixor" class="rounded-lg shadow-lg">
            </div>
            
            <div>
                <h2 class="text-3xl font-bold mb-6">Salom! Men Iftixor</h2>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Men 5+ yillik tajribaga ega backend dasturchiman. PHP, Node.js, MySQL va 
                    zamonaviy texnologiyalar yordamida kuchli va ishonchli backend tizimlar yarataman.
                </p>
                
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Mening asosiy yo'nalishlarim: RESTful API yaratish, ma'lumotlar bazasi 
                    optimallashtirish, mikroservis arxitekturasi va DevOps amaliyotlari.
                </p>

                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4">Mutaxassislik sohalari:</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            Backend Development (PHP, Node.js)
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            RESTful API Design & Development
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            Database Design & Optimization
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            Microservices Architecture
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            DevOps & Cloud Technologies
                        </li>
                    </ul>
                </div>

                <a href="/contact" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg font-medium transition inline-block">
                    <i class="fas fa-envelope mr-2"></i>Bog'lanish
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section class="py-20 bg-gray-800">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Ish Tajribasi</h2>
            <p class="text-gray-400 text-lg">Professional faoliyatim</p>
        </div>

        <div class="space-y-8">
            <?php
            $experiences = [
                [
                    'position' => 'Senior Backend Developer',
                    'company' => 'Tech Solutions LLC',
                    'period' => '2022 - Hozir',
                    'description' => 'Katta hajmdagi web ilovalar uchun backend arxitektura yaratish va boshqarish'
                ],
                [
                    'position' => 'Backend Developer',
                    'company' => 'Digital Agency',
                    'period' => '2020 - 2022',
                    'description' => 'E-commerce va CMS tizimlari yaratish, API integratsiyalari'
                ],
                [
                    'position' => 'Junior PHP Developer',
                    'company' => 'StartUp Company',
                    'period' => '2019 - 2020',
                    'description' => 'Web ilovalar yaratish, ma\'lumotlar bazasi bilan ishlash'
                ]
            ];

            foreach($experiences as $exp): ?>
                <div class="bg-gray-700 p-6 rounded-lg">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-semibold text-blue-400"><?= $exp['position'] ?></h3>
                            <p class="text-gray-300"><?= $exp['company'] ?></p>
                        </div>
                        <span class="text-gray-400 text-sm"><?= $exp['period'] ?></span>
                    </div>
                    <p class="text-gray-300"><?= $exp['description'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>