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
<body class="bg-gray-100 min-h-screen">
    <!-- Main Content -->
    <main class="flex-1 p-8 space-y-8">
        <!-- Welcome Section -->
        <section class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Welcome to User Management</h1>
            <p class="text-gray-600 text-lg">Choose a module</p>
        </section>
        <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
        <!-- Dashboard Cards -->
        
            <!-- Users Table -->
            <div class="bg-white rounded-xl shadow-sm">
                <div class="flex justify-between items-center mb-4 bg-green-500 p-4 text-white rounded-xl">
                    <h2 class="text-xl font-bold text-white-800">ITSO Personnel Database</h2>
                    <button onclick="window.location.href='<?= base_url('users/add') ?>'" 
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors">
                        Add New User
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">ID</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Username</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Full Name</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Email</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-4"><?= $user['id']; ?></td>
                                <td class="py-3 px-4"><?= $user['username']; ?></td>
                                <td class="py-3 px-4"><?= $user['first_name']; ?></td>
                                <td class="py-3 px-4"><?= $user['email']; ?></td>
                                <td class="py-3 px-4">
                                        <?php 
                                        $status = $user['status'] ?? 'ACTIVE';
                                        $statusColor = $status === 'ACTIVE' ? 'text-green-600 font-bold' : 'text-red-600 font-bold';
                                        ?>
                                        <span class="<?= $statusColor ?>"><?= $status ?></span>
                                    </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <!-- View Button -->
                                        <button onclick="window.location.href='<?= base_url('users/view/' . $user['id']); ?>'"
                                            class="bg-orange-500 hover:bg-green-600 text-white p-2 rounded transition-colors" title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>

                                        <!-- Edit Button -->
                                        <button onclick="window.location.href='<?= base_url('users/edit/' . $user['id']); ?>'" 
                                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition-colors" 
                                                title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>

                                        <!-- Delete Button -->
                                        <button onclick="showModal(<?= $user['id'] ?>, '<?= addslashes($user['username']) ?>')" 
                                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded transition-colors" 
                                                title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <!-- Change Password Card -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <!-- Activate User Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('users/status'); ?>" class="text-decoration-none">
                    <div class="bg-orange-500 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-toggle-on mr-2"></i>
                            ACTIVATE/DEACTIVATE USER
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-orange-100 p-4 rounded-full mb-4">
                            <i class="fas fa-user-check text-orange-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Activate / Deactivate</h3>
                        <p class="text-gray-600 mb-6">Activate / Deactivate user accounts</p>
                    </div>
                </a>
            </div>
            
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>