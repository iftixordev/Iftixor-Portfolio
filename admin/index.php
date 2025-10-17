<?php
session_start();

// Simple admin credentials
$admin_username = 'admin';
$admin_password = 'admin123'; // Change this!

$error = '';
$page = $_GET['page'] ?? 'dashboard';

// Login check
if (!isset($_SESSION['admin_logged_in'])) {
    if ($_POST) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($username === $admin_username && $password === $admin_password) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: index.php');
            exit;
        } else {
            $error = 'Noto\'g\'ri login yoki parol!';
        }
    }
    
    // Show login form
    include 'login.php';
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Iftixor Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 flex-shrink-0">
            <div class="p-6">
                <h2 class="text-xl font-bold">Admin Panel</h2>
                <p class="text-gray-400 text-sm">Iftixor Portfolio</p>
            </div>
            
            <nav class="mt-6">
                <a href="?page=dashboard" class="<?= $page === 'dashboard' ? 'bg-blue-600' : '' ?> block px-6 py-3 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                </a>
                <a href="?page=projects" class="<?= $page === 'projects' ? 'bg-blue-600' : '' ?> block px-6 py-3 hover:bg-gray-700">
                    <i class="fas fa-code mr-3"></i>Loyihalar
                </a>
                <a href="?page=blog" class="<?= $page === 'blog' ? 'bg-blue-600' : '' ?> block px-6 py-3 hover:bg-gray-700">
                    <i class="fas fa-blog mr-3"></i>Blog
                </a>
                <a href="?page=contacts" class="<?= $page === 'contacts' ? 'bg-blue-600' : '' ?> block px-6 py-3 hover:bg-gray-700">
                    <i class="fas fa-envelope mr-3"></i>Xabarlar
                </a>
                <a href="?page=settings" class="<?= $page === 'settings' ? 'bg-blue-600' : '' ?> block px-6 py-3 hover:bg-gray-700">
                    <i class="fas fa-cog mr-3"></i>Sozlamalar
                </a>
            </nav>
            
            <div class="absolute bottom-0 w-64 p-6">
                <a href="?logout=1" class="block bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-center">
                    <i class="fas fa-sign-out-alt mr-2"></i>Chiqish
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b px-6 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-800">
                        <?php
                        $titles = [
                            'dashboard' => 'Dashboard',
                            'projects' => 'Loyihalar',
                            'blog' => 'Blog',
                            'contacts' => 'Xabarlar',
                            'settings' => 'Sozlamalar'
                        ];
                        echo $titles[$page] ?? 'Admin Panel';
                        ?>
                    </h1>
                    <div class="flex items-center space-x-4">
                        <a href="../" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-external-link-alt mr-1"></i>Saytni ko'rish
                        </a>
                        <span class="text-gray-600">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                <?php
                switch($page) {
                    case 'projects':
                        include 'pages/projects.php';
                        break;
                    case 'blog':
                        include 'pages/blog.php';
                        break;
                    case 'contacts':
                        include 'pages/contacts.php';
                        break;
                    case 'settings':
                        include 'pages/settings.php';
                        break;
                    default:
                        include 'pages/dashboard.php';
                }
                ?>
            </main>
        </div>
    </div>
</body>
</html>