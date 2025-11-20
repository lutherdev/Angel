<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITSO Equipment Management System</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Personnel Database</h2>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">ID</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Username</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Full Name</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Email</th>
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
                <div class="flex space-x-2">
                    
                    <!-- View Button -->
                    <button onclick="window.location.href='<?= base_url('users/edit/' . $user['id']); ?>'"
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded transition-colors" title="View">
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
                    <button onclick="window.location.href='<?= base_url('users/delete/' . $user['id']); ?>'" 
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
    </main>
</body>
</html>
<?= $this->endSection() ?>