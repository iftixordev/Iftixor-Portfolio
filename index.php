<?php
session_start();
$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iftixor - Backend Developer Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: transform 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Navigation -->
    <nav class="bg-gray-800 shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <i class="fas fa-code text-blue-400 text-2xl mr-2"></i>
                    <span class="text-xl font-bold">Iftixor</span>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="?page=home" class="hover:text-blue-400 transition">Bosh sahifa</a>
                    <a href="?page=about" class="hover:text-blue-400 transition">Men haqimda</a>
                    <a href="?page=projects" class="hover:text-blue-400 transition">Loyihalar</a>
                    <a href="?page=blog" class="hover:text-blue-400 transition">Blog</a>
                    <a href="?page=contact" class="hover:text-blue-400 transition">Aloqa</a>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-white">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        <?php
        switch($page) {
            case 'about':
                include 'pages/about.php';
                break;
            case 'projects':
                include 'pages/projects.php';
                break;
            case 'blog':
                include 'pages/blog.php';
                break;
            case 'contact':
                include 'pages/contact.php';
                break;
            default:
                include 'pages/home.php';
        }
        ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="https://github.com/iftixor" class="text-gray-400 hover:text-white">
                    <i class="fab fa-github text-2xl"></i>
                </a>
                <a href="https://linkedin.com/in/iftixor" class="text-gray-400 hover:text-white">
                    <i class="fab fa-linkedin text-2xl"></i>
                </a>
                <a href="mailto:iftixor@example.com" class="text-gray-400 hover:text-white">
                    <i class="fas fa-envelope text-2xl"></i>
                </a>
            </div>
            <p class="text-gray-400">&copy; 2024 Iftixor. Barcha huquqlar himoyalangan.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            // Mobile menu logic here
        });
    </script>
</body>
</html>