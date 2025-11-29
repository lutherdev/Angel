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
    <div class="max-w-2xl w-full">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="bg-white p-4 rounded-full shadow-lg">
                    <i class="fas fa-user-plus text-3xl text-green-600"></i>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">ITSO Equipments</h1>
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
                <h2 class="text-2xl font-bold text-gray-800 mb-2">REGISTER</h2>
                <p class="text-gray-600">Please fill in required details</p>
                <div class="w-16 h-1 bg-green-600 mx-auto rounded-full mt-2"></div>
            </div>

            <form action="<?= base_url('auth/register')?>" method="post" novalidate class="space-y-6">
                <div>
                    <label for="username" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-user mr-2 text-green-600"></i>Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Enter your username"
                    >
                </div>

                <div>
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-lock mr-2 text-green-600"></i>Password
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Enter your password"
                    >
                </div>

                <div>
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-envelope mr-2 text-green-600"></i>Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Enter your email address"
                    >
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="firstname" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-signature mr-2 text-green-600"></i>First Name
                        </label>
                        <input 
                            type="text" 
                            name="firstname" 
                            id="firstname" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                            placeholder="First name"
                        >
                    </div>

                    <div>
                        <label for="middlename" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-signature mr-2 text-green-600"></i>Middle Name
                        </label>
                        <input 
                            type="text" 
                            name="middlename" 
                            id="middlename" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                            placeholder="Middle name"
                        >
                    </div>

                    <div>
                        <label for="lastname" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-signature mr-2 text-green-600"></i>Last Name
                        </label>
                        <input 
                            type="text" 
                            name="lastname" 
                            id="lastname" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                            placeholder="Last name"
                        >
                    </div>
                </div>

                <div>
                    <label for="role" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-user-tag mr-2 text-green-600"></i>Role
                    </label>
                    <select 
                        name="role" 
                        id="role" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                    >
                        <option value="">Select role</option>
                        <option value="Personnel">Student</option>
                        <option value="Associate">Associate</option>
                    </select>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg font-semibold flex items-center justify-center transition duration-200 shadow-lg hover:shadow-xl mb-4"
                >
                    <i class="fas fa-user-plus mr-2"></i>
                    REGISTER
                </button>

                <div class="text-center">
                    <a 
                        href='<?= base_url('/login');?>' 
                        class="text-green-600 hover:text-green-800 font-medium flex items-center justify-center transition duration-200"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Already have an account? LOGIN
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>