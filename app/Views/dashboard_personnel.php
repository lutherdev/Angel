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

    <!-- Main Content Area -->
    <main class="flex-1 p-8 space-y-8">
        <section class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">ITSO System</h1>
            <p class="text-gray-600 text-lg">Choose a module</p>
        </section>
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
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <!-- Users Total Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <div class="bg-orange-500 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-users mr-2"></i>
                        TOTAL USERS
                    </h2>
                </div>

                <div class="p-6 flex flex-col items-center text-center h-full">
                    <div class="bg-orange-100 p-4 rounded-full mb-4">
                        <i class="fas fa-user-friends text-orange-600 text-3xl"></i>
                    </div>

                    <!-- Output the total users here -->
                    <h3 class="text-5xl font-bold text-gray-800 mb-2">
                        <?= esc(count($users)) ?>
                    </h3>

                    <p class="text-gray-600">Registered users in the system</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <div class="bg-orange-500 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-users mr-2"></i>
                        TOTAL ACTIVE EQUIPMENTS
                    </h2>
                </div>

                <div class="p-6 flex flex-col items-center text-center h-full">
                    <div class="bg-orange-100 p-4 rounded-full mb-4">
                        <i class="fas fa-user-friends text-orange-600 text-3xl"></i>
                    </div>

                    <!-- Output the total equipments here here -->
                    <?php $activeEquipments = array_filter($equipments, function($item) {
                        return strtoupper($item['status']) === 'ACTIVE';
                    });?>
                    <h3 class="text-5xl font-bold text-gray-800 mb-2">
                        <?= esc(count($activeEquipments)) ?>
                    </h3>

                    <p class="text-gray-600">Active Equipments in the system</p>
                </div>
            </div>
            
        </div>
        <!-- DATABASE TABLE -->
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
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">User</th>
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
                                            <span class="font-medium"><?= '#'.$reservation['user_id'].' - ' . $reservation['username'] ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><span class="font-medium"><?= $reservation['first_name'] .' '. $reservation['last_name'] ?></span></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-laptop text-gray-400 mr-2"></i>
                                            <span><?=  '#'.$reservation['equipment_id']. ' - '. $reservation['equipment_name'] ?></span>
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
                                            'done' => 'bg-green-100 text-green-800',
                                            'reserved' => 'bg-yellow-100 text-yellow-800',
                                            'rescheduled' => 'bg-blue-100 text-blue-800',
                                            'released' => 'bg-green-100 text-red-800',
                                            'cancelled' => 'bg-red-100 text-red-800'
                                        ];
                                        $statusLower = strtolower(trim($reservation['status']));
                                        $statusColor = $statusColors[$statusLower] ?? 'bg-gray-100 text-gray-800';
                                        ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusColor ?>">
                                            <i class="fas fa-circle mr-1 text-xs"></i>
                                            <?= ucfirst($reservation['status']) ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex space-x-2">

                                        <a href="<?= base_url('reservation/done/' . $reservation['reservation_id']); ?>"
                                                class="bg-green-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Done Reservation">
                                                    <i class="fas fa-check-double w-4 h-4"></i>
                                                </a>

                                            <a href="<?= base_url('reservation/confirm/' . $reservation['reservation_id']); ?>"
                                                class="bg-green-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Confirm Reservation">
                                                    <i class="fas fa-arrow-right w-4 h-4"></i>
                                                </a>

                                            <a href="<?= base_url('reservation/view/' . $reservation['reservation_id']); ?>"
                                                class="bg-orange-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="View Details">
                                                    <i class="fas fa-eye w-4 h-4"></i>
                                                </a>

                                            
                                            <a href="<?= base_url('reservation/edit/' . $reservation['reservation_id']); ?>"
                                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200"
                                                title="Edit Details">
                                                    <i class="fas fa-edit w-4 h-4"></i>
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
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">User</th>
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
                                            <span class="font-medium"><?= '#'.$borrower['user_id'] .' - '. $borrower['username']//fullname? ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4"> 
                                        <span class="font-medium"><?= $borrower['first_name'] .' '. $borrower['last_name']  //fullname? ?></span>
                                    </td>
                                    <td class="py-4 px-4"> 
                                        <i class="fas fa-laptop text-gray-400 mr-2"></i>
                                        <span class="font-medium"><?= '#'.$borrower['equipment_id'].' - '.$borrower['equipment_name'] //equipment ?></span>
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
                                                class="bg-orange-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors duration-200"
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