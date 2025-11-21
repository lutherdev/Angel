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
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Welcome Section -->
        <section class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Welcome to User Management</h1>
            <p class="text-gray-600 text-lg">Choose a module to continue</p>
        </section>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <!-- Database Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-yellow-500 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-database mr-2"></i>
                        USER DATABASE
                    </h2>
                </div>
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-3 text-left">ID</th>
                                    <th class="py-2 px-3 text-left">USERNAME</th>
                                    <th class="py-2 px-3 text-left">FIRST NAME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-3"><?= $user['id']; ?></td>
                                    <td class="py-2 px-3"><?= $user['username']; ?></td>
                                    <td class="py-2 px-3"><?= $user['first_name']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('/change'); ?>" class="text-decoration-none">
                    <div class="bg-blue-600 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-key mr-2"></i>
                            CHANGE PASSWORD
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-blue-100 p-4 rounded-full mb-4">
                            <i class="fas fa-lock text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Change Password</h3>
                        <p class="text-gray-600 mb-6">Update user passwords</p>
                        <div class="mt-auto bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium flex items-center">
                            <i class="fas fa-key mr-2"></i>
                            Change
                        </div>
                    </div>
                </a>
            </div>

            <!-- Activate User Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('users/activate'); ?>" class="text-decoration-none">
                    <div class="bg-green-500 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-toggle-on mr-2"></i>
                            ACTIVATE USER
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-green-100 p-4 rounded-full mb-4">
                            <i class="fas fa-user-check text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Activate</h3>
                        <p class="text-gray-600 mb-6">Activate user accounts</p>
                        <div class="mt-auto bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-medium flex items-center">
                            <i class="fas fa-toggle-on mr-2"></i>
                            Activate
                        </div>
                    </div>
                </a>
            </div>

            <!-- Deactivate User Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('users/deactivate'); ?>" class="text-decoration-none">
                    <div class="bg-red-600 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-toggle-off mr-2"></i>
                            DEACTIVATE USER
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-red-100 p-4 rounded-full mb-4">
                            <i class="fas fa-user-slash text-red-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deactivate</h3>
                        <p class="text-gray-600 mb-6">Deactivate user accounts</p>
                        <div class="mt-auto bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium flex items-center">
                            <i class="fas fa-toggle-off mr-2"></i>
                            Deactivate
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>