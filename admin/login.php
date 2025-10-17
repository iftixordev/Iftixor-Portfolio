<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Iftixor Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="text-center mb-8">
            <i class="fas fa-user-shield text-4xl text-blue-400 mb-4"></i>
            <h2 class="text-2xl font-bold text-white">Admin Panel</h2>
            <p class="text-gray-400">Iftixor Portfolio</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <i class="fas fa-exclamation-circle mr-2"></i><?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-medium mb-2">
                    <i class="fas fa-user mr-2"></i>Foydalanuvchi nomi
                </label>
                <input 
                    type="text" 
                    name="username" 
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-blue-500"
                    required
                >
            </div>

            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-medium mb-2">
                    <i class="fas fa-lock mr-2"></i>Parol
                </label>
                <input 
                    type="password" 
                    name="password" 
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-blue-500"
                    required
                >
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition"
            >
                <i class="fas fa-sign-in-alt mr-2"></i>Kirish
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="../" class="text-blue-400 hover:text-blue-300 text-sm">
                <i class="fas fa-arrow-left mr-1"></i>Saytga qaytish
            </a>
        </div>

        <div class="mt-4 text-center text-xs text-gray-500">
            Default: admin / admin123
        </div>
    </div>
</body>
</html>