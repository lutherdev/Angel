<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'TW32 App - View Equipment Record' ?></title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <button onclick="window.location.href='<?= base_url('users'); ?>'" 
                        class="flex items-center text-green-900 hover:text-green-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to List
                </button>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-green-900 to-yellow-500 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">Equipment Details</h2>
                </div>
                
                <div class="p-6">
                    <?php if (isset($equipment) && !empty($equipment)): ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Equipment ID -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Equipment ID</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($equipment['id']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Equipment Name -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Equipment Name</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($equipment['name']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-green-900 mb-1">Description</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($equipment['description']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Category -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Category</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($equipment['category'] ?? 'Not specified') ?></p>
                                </div>
                            </div>
                            
                            <!-- Quantity -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Quantity</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($equipment['quantity']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Available Count -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Available Count</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <p class="text-gray-900 font-medium"><?= esc($equipment['avail_count']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-green-900 mb-1">Status</label>
                                <div class="p-3 bg-green-50 rounded-md border border-green-200">
                                    <?php 
                                    $status = $equipment['status'] ?? 'available';
                                    $statusLower = strtolower($status);
                                    $statusColor = $statusLower === 'available' ? 'text-green-600 font-bold' : 'text-red-600 font-bold';
                                    ?>
                                    <p class="<?= $statusColor ?>"><?= ucfirst($status) ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="mt-8 pt-6 border-t border-green-200 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                            <button onclick="window.location.href='<?= base_url('equipments/edit/' . $equipment['id']); ?>'" 
                                    class="bg-green-900 hover:bg-green-800 text-white px-4 py-2 rounded-md flex items-center justify-center transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit Equipment
                            </button>
                            
                            <button onclick="window.location.href='<?= base_url('dashboard'); ?>'" 
                                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-4 py-2 rounded-md transition-colors">
                                Back to Equipment
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 mx-auto text-green-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-green-900">Equipment not found</h3>
                            <p class="mt-2 text-green-700">The requested equipment could not be found.</p>
                            <button onclick="window.location.href='<?= base_url('dashboard'); ?>'" 
                                    class="mt-4 bg-green-900 hover:bg-green-800 text-white px-4 py-2 rounded-md transition-colors">
                                Back to Equipment
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Function to handle sidebar toggle (if needed)
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Function to set active navigation item
        function setActiveNavItem(element) {
            // Remove active class from all nav items
            document.querySelectorAll('nav a').forEach(item => {
                item.classList.remove('bg-green-700');
            });
            // Add active class to clicked item
            element.classList.add('bg-green-700');
        }
    </script>
</body>
</html>
<?= $this->endSection() ?>