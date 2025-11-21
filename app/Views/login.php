<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSO Equipment Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(130deg, #1e740dff 0%, #b5a70fff 100%);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="bg-white p-4 rounded-full shadow-lg">
                    <i class="fas fa-laptop-house text-3xl text-blue-600"></i>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">ITSO Equipments</h1>
            <p class="text-blue-100 text-lg">Please login to your account</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 text-center">
                <i class="fas fa-check-circle mr-2"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">LOGIN</h2>
                <div class="w-16 h-1 bg-green-600 mx-auto rounded-full"></div>
            </div>

            <form action="<?= base_url('auth/login') ?>" method="post">
                <div class="mb-6">
                    <label for="username" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-user mr-2 text-green-600"></i>Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        value="" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Enter your username"
                    >
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-lock mr-2 text-green-600"></i>Password
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        placeholder="Enter your password"
                    >
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-green-900 hover:bg-yellow-500 text-white py-3 px-4 rounded-lg font-semibold flex items-center justify-center transition duration-200 shadow-lg hover:shadow-xl mb-4"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    LOGIN
                </button>

                <div class="text-center">
                    <a 
                        href='<?= base_url('/register');?>' 
                        class="text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center transition duration-200"
                    >
                        <i class="fas fa-user-plus mr-2"></i>
                        REGISTER
                    </a>
                    <a 
                        href='<?= base_url('forget');?>' 
                        class="text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center transition duration-200"
                    >
                        Forgot Password
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>