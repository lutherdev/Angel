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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="<?= base_url('/public/js/dashboard_personnel.js') ?>"></script>
    <style>
        .modal-hidden {
            display: none !important;
        }
        .modal-visible {
            display: flex !important;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 modal-hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full mx-4">
            <div class="flex items-center mb-4">
                <div class="bg-red-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Confirm Deletion</h3>
            </div>
            <p id="deleteMessage" class="text-gray-600 mb-6">Are you sure you want to delete this user? This action cannot be undone.</p>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="hideModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors rounded-md border border-gray-300 hover:border-gray-400">
                    Cancel
                </button>
                <button type="button" onclick="confirmDelete()" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors">
                    Delete User
                </button>
            </div>
        </div>
    </div>

    <!-- Equipment Delete Confirmation Modal -->
    <div id="equipmentDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 modal-hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full mx-4">
            <div class="flex items-center mb-4">
                <div class="bg-red-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Confirm Equipment Deletion</h3>
            </div>
            <p id="equipmentDeleteMessage" class="text-gray-600 mb-6">Are you sure you want to delete this equipment? This action cannot be undone.</p>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="hideEquipmentModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors rounded-md border border-gray-300 hover:border-gray-400">
                    Cancel
                </button>
                <button type="button" onclick="confirmEquipmentDelete()" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors">
                    Delete Equipment
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="flex-1 p-8 space-y-8">
        <!-- Users Table -->
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
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">ITSO Personnel Database</h2>
                <button onclick="window.location.href='<?= base_url('users/add') ?>'" 
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors">
                    Add New User
                </button>
            </div>
            
            <!-- Success/Error Messages -->
            
            
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

        <!-- Equipment Table -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Equipment Database</h2>
                <button onclick="window.location.href='<?= base_url('equipments/add') ?>'" 
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors">
                    Add New Equipment
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">ID</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Name</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Description</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Category</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Quantity</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Available</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($equipments) && !empty($equipments)): ?>
                            <?php foreach ($equipments as $equipment): ?>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-4"><?= $equipment['id']; ?></td>
                                <td class="py-3 px-4"><?= $equipment['name']; ?></td>
                                <td class="py-3 px-4"><?= $equipment['description']; ?></td>
                                <td class="py-3 px-4"><?= $equipment['category'] ?? 'N/A'; ?></td>
                                <td class="py-3 px-4"><?= $equipment['quantity']; ?></td>
                                <td class="py-3 px-4"><?= $equipment['avail_count']; ?></td>
                                <td class="py-3 px-4">
                                    <?php 
                                    $status = $equipment['status'] ?? 'ACTIVE';
                                    $statusColor = $status === 'ACTIVE' ? 'text-green-600 font-bold' : 'text-red-600 font-bold';
                                    ?>
                                    <span class="<?= $statusColor ?>"><?= ucfirst($status) ?></span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <!-- View Button -->
                                        <button onclick="window.location.href='<?= base_url('equipments/view/' . $equipment['id']); ?>'"
                                            class="bg-green-500 hover:bg-green-600 text-white p-2 rounded transition-colors" title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>

                                        <!-- Edit Button -->
                                        <button onclick="window.location.href='<?= base_url('equipments/edit/' . $equipment['id']); ?>'" 
                                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition-colors" 
                                                title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>

                                        <!-- Delete Button -->
                                        <button onclick="showEquipmentModal(<?= $equipment['id'] ?>, '<?= addslashes($equipment['name']) ?>')" 
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
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="py-4 px-4 text-center text-gray-500">
                                    No equipment found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Reservations Database</h2>
                <div class="text-sm text-gray-500">
                    Total Reservations: <span class="font-semibold text-blue-600"><?= !empty($reservations) ? count($reservations) : 0 ?></span>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b-2 border-gray-200 bg-gray-50">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Reservation ID</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Username</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Name</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Equipment</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Reserved Date</th>
                            <!-- <th class="text-left py-4 px-4 font-semibold text-gray-700">Valid Until</th> -->
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reservations)): ?>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4 font-medium text-gray-900">#<?= $reservation['reservation_id'] ?></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-blue-600 text-xs"></i>
                                            </div>
                                            <span class="font-medium"><?= $reservation['user_id'] // replace with username ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><?=  $reservation['user_id'] //user name here ?></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-laptop text-gray-400 mr-2"></i>
                                            <span><?=  $reservation['equipment_id']. ' - '. $reservation['equipment_id'] ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><?= date('M j, Y', strtotime($reservation['reserved_date'])) ?></td>
                                    <!-- <td class="py-4 px-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            <// strtotime($reservation['valid_until']) < time() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' ?>">
                                            <// date('M j, Y', strtotime($reservation['valid_until'])) ?>
                                        </span> 
                                        <td class="py-4 px-4 text-gray-600">< date('M j, Y', strtotime($reservation['valid_until'])) ?></td>
                                    </td> -->
                                    <td class="py-4 px-4">
                                        <?php
                                        $statusColors = [
                                            'DONE' => 'bg-green-100 text-green-800',
                                            'RESERVED' => 'bg-yellow-100 text-yellow-800',
                                            'RESCHEDULED' => 'bg-blue-100 text-blue-800',
                                            'RELEASED' => 'bg-green-100 text-red-800',
                                            'CANCELLED' => 'bg-red-100 text-red-800'
                                        ];
                                        $statusColor = $statusColors[$reservation['status']] ?? 'bg-gray-100 text-gray-800';
                                        ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusColor ?>">
                                            <i class="fas fa-circle mr-1 text-xs"></i>
                                            <?= ucfirst($reservation['status']) ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex space-x-2">

                                            <a href="<?= base_url('reservation/confirm/' . $reservation['reservation_id']); ?>"
                                                class="bg-green-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Confirm Reservation">
                                                    <i class="fas fa-check w-4 h-4"></i>
                                                </a>

                                            <a href="<?= base_url('reservation/view/' . $reservation['reservation_id']); ?>"
                                                class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="View Details">
                                                    <i class="fas fa-eye w-4 h-4"></i>
                                                </a>

                                            
                                            <a href="<?= base_url('reservation/edit/' . $reservation['reservation_id']); ?>"
                                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Edit Details">
                                                    <i class="fas fa-edit w-4 h-4"></i>
                                                </a>

                                            <a href="<?= base_url('reservation/done/' . $reservation['reservation_id']); ?>"
                                                class="bg-green-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Done Reservation">
                                                    <i class="fas fa-check-double w-4 h-4"></i>
                                                </a>

                                            
                                            <a href="<?= base_url('reservation/delete/' . $reservation['reservation_id']); ?>"
                                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Delete Details">
                                                    <i class="fas fa-trash w-4 h-4"></i>
                                                </a>
                                            
                                            

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="py-8 px-4 text-center text-gray-500">
                                    <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-lg">No reservations found</p>
                                    <p class="text-sm text-gray-400 mt-1">All reservations will appear here</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Borrowers Section -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Borrowers Management</h2>
                <div class="flex space-x-4">
                    <div class="text-sm text-gray-500">
                        Total Borrowers: <span class="font-semibold text-blue-600"><?= !empty($borrowers) ? count($borrowers) : 0 ?></span>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b-2 border-gray-200 bg-gray-50">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Borrower ID</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">User ID</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Username</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Name</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Equipment</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Return Date</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($borrowers)): ?>
                            <?php foreach ($borrowers as $borrower): ?>
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4 font-medium text-gray-900">#<?= $borrower['borrow_id'] ?></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-purple-600 text-xs"></i>
                                            </div>
                                            <span class="font-medium"><?= $borrower['user_id'] //fullname? ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4"> <!-- username -->
                                        <span class="font-medium"><?= $borrower['user_id'] //fullname? ?></span>
                                    </td>
                                    <td class="py-4 px-4"> <!-- full name -->
                                        <span class="font-medium"><?= $borrower['user_id'] //fullname? ?></span>
                                    </td>
                                    <td class="py-4 px-4"> <!-- equipment id and name -->
                                        <span class="font-medium"><?= $borrower['equipment_id'].' - '.$borrower['equipment_id'] //equipment ?></span>
                                    </td>
                                    
                                    <td class="py-4 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            <?= $borrower['status'] === 'RETURNED' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-orange-800' ?>">
                                            <i class="fas fa-circle mr-1 text-xs"></i>
                                            <?= $borrower['status'] ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><?= date('M j, Y', strtotime($borrower['return_date'])) ?></td>
                                    
                                    <td class="py-4 px-4">
                                        <div class="flex space-x-2">
                                            <a href="<?= base_url('borrow/view/' . $borrower['borrow_id']); ?>"
                                                class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="View Details">
                                                    <i class="fas fa-eye w-4 h-4"></i>
                                                </a>

                                            
                                            <a href="<?= base_url('borrow/edit/' . $borrower['borrow_id']); ?>"
                                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Edit Details">
                                                    <i class="fas fa-edit w-4 h-4"></i>
                                                </a>
                                            
                                            <a href="<?= base_url('borrow/delete/' . $borrower['borrow_id']); ?>"
                                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Delete Details">
                                                    <i class="fas fa-trash w-4 h-4"></i>
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="py-8 px-4 text-center text-gray-500">
                                    <i class="fas fa-users text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-lg">No borrowers found</p>
                                    <p class="text-sm text-gray-400 mt-1">Add new borrowers to get started</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        let currentUserId = null;
        let currentEquipmentId = null;

        // User Modal Functions
        function showModal(userId, username) {
            currentUserId = userId;
            const modal = document.getElementById('deleteModal');
            const message = document.getElementById('deleteMessage');
            
            message.textContent = `Are you sure you want to delete user "${username}"? This action cannot be undone.`;
            modal.classList.remove('modal-hidden');
            modal.classList.add('modal-visible');
        }

        function hideModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('modal-visible');
            modal.classList.add('modal-hidden');
            currentUserId = null;
        }

        function confirmDelete() {
            if (currentUserId) {
                window.location.href = '<?= base_url('users/delete/') ?>' + currentUserId;
            }
        }

        // Equipment Modal Functions
        function showEquipmentModal(equipmentId, equipmentName) {
            currentEquipmentId = equipmentId;
            const modal = document.getElementById('equipmentDeleteModal');
            const message = document.getElementById('equipmentDeleteMessage');
            
            message.textContent = `Are you sure you want to delete equipment "${equipmentName}"? This action cannot be undone.`;
            modal.classList.remove('modal-hidden');
            modal.classList.add('modal-visible');
        }

        function hideEquipmentModal() {
            const modal = document.getElementById('equipmentDeleteModal');
            modal.classList.remove('modal-visible');
            modal.classList.add('modal-hidden');
            currentEquipmentId = null;
        }

        function confirmEquipmentDelete() {
            if (currentEquipmentId) {
                window.location.href = '<?= base_url('equipments/delete/') ?>' + currentEquipmentId;
            }
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(event) {
            const userModal = document.getElementById('deleteModal');
            const equipmentModal = document.getElementById('equipmentDeleteModal');
            
            if (event.target === userModal) {
                hideModal();
            }
            if (event.target === equipmentModal) {
                hideEquipmentModal();
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                hideModal();
                hideEquipmentModal();
            }
        });
    </script>
</body>
</html>
<?= $this->endSection() ?>