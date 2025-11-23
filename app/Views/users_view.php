<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'TW32 App - View User Record' ?></title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <button onclick="window.location.href='<?= base_url('dashboard'); ?>'" 
                        class="flex items-center text-green-900 hover:text-green-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Users
                </button>
            </div>
            
            <!-- User Details Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <!-- Card Header - Using the green gradient from navbar -->
                <div class="bg-gradient-to-r from-green-900 to-yellow-500 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">User Details</h2>
                </div>
                
                <!-- Card Content -->
                <div class="p-6">
                    <?php if (isset($user) && !empty($user)): ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- User ID -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">User ID</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($user['id']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Username -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Username</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($user['username']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Full Name -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-green-900 mb-1">Full Name</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium">
                                        <?= esc($user['first_name']) ?>
                                        <?= !empty($user['middle_name']) ? esc($user['middle_name']) : '' ?>
                                        <?= esc($user['last_name']) ?>
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-green-900 mb-1">Email</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($user['email']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Role -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Role</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <?php 
                                    $role = $user['role'] ?? 'Not specified';
                                    $roleColor = $role === 'Personnel' ? 'text-green-700' : 'text-yellow-600';
                                    ?>
                                    <p class="<?= $roleColor ?> font-bold"><?= esc($role) ?></p>
                                </div>
                            </div>
                            
                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Status</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <?php 
                                    $status = $user['status'] ?? 'Active';
                                    $statusColor = $status === 'Active' ? 'text-green-600 font-bold' : 'text-red-600 font-bold';
                                    ?>
                                    <p class="<?= $statusColor ?>"><?= ucfirst($status) ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 pt-6 border-t border-green-200 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                            <!-- Back to List -->
                            <button onclick="window.location.href='<?= base_url('dashboard'); ?>'" 
                                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-4 py-2 rounded-md transition-colors">
                                Back to List
                            </button>
                        </div>
                    <?php else: ?>
                        <!-- Error screen -->
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 mx-auto text-green-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-green-900">User not found</h3>
                            <p class="mt-2 text-green-700">The requested user could not be found.</p>
                            <button onclick="window.location.href='<?= base_url('dashboard'); ?>'" 
                                    class="mt-4 bg-green-900 hover:bg-green-800 text-white px-4 py-2 rounded-md transition-colors">
                                Back to Users
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
  </body>
</html>
<?= $this->endSection() ?>