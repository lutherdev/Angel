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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Forgot Password</h1>
            <p class="text-gray-600 text-lg">Enter your email to reset your password</p>
        </section>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-gradient-to-b from-green-900 to-yellow-500
 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-key mr-2"></i>
                        RESET PASSWORD
                    </h2>
                </div>
                
                <div class="p-6">
                    <form action="<?= base_url('auth/forgot_password') ?>" method="POST">
                        <div class="mb-8">
                            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-envelope mr-2 text-green-600"></i>Email Address
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                                placeholder="Enter your registered email address"
                                value="<?= old('email') ?>"
                            >
                            <p class="text-gray-500 text-sm mt-2">
                                We'll send a password reset link to your email.
                            </p>
                        </div>

                        <!-- Success/Error Messages -->
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($validation)): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <div class="flex justify-between items-center">
                            <a href="<?= base_url('/login') ?>" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Login
                            </a>
                            <button 
                                type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium flex items-center transition duration-200 shadow-md hover:shadow-lg"
                            >
                                <i class="fas fa-paper-plane mr-2"></i>
                                Send Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Simple client-side validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Please enter a valid email address.');
                return false;
            }
        });
    </script>
</body>
</html>
<?= $this->endSection() ?>