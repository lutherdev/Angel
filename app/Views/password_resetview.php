<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
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
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <section class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Reset Password</h1>
            <p class="text-gray-600 text-lg">Update user password</p>
        </section>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-blue-600 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-key mr-2"></i>
                        RESET PASSWORD
                    </h2>
                </div>
                
                <div class="p-6">
                    <form>
                        <div class="mb-6">
                            <label for="current_password" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-lock mr-2 text-blue-600"></i>Current Password
                            </label>
                            <input 
                                type="password" 
                                name="current_password" 
                                id="current_password" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                placeholder="Enter current password"
                            >
                        </div>

                        <div class="mb-6">
                            <label for="new_password" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-lock mr-2 text-blue-600"></i>New Password
                            </label>
                            <input 
                                type="password" 
                                name="new_password" 
                                id="new_password" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                placeholder="Enter new password"
                            >
                        </div>

                        <div class="mb-8">
                            <label for="confirm_password" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-lock mr-2 text-blue-600"></i>Confirm New Password
                            </label>
                            <input 
                                type="password" 
                                name="confirm_password" 
                                id="confirm_password" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                placeholder="Confirm new password"
                            >
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="<?= base_url('/users') ?>" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back
                            </a>
                            <button 
                                type="button" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium flex items-center transition duration-200 shadow-md hover:shadow-lg"
                                onclick="alert('Password reset successfully!')"
                            >
                                <i class="fas fa-sync-alt mr-2"></i>
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>