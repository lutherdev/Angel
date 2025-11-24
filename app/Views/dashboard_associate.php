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

<body class="bg-gray-100">
    <main class="flex-1 p-8">
        <section class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">ITSO Service</h1>
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
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Your Reservations History</h2>
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
                                            <span class="font-medium"><?= $reservation['username'] // replace with username ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><span class="font-medium"><?= $reservation['first_name'] .' '. $reservation['last_name']  //fullname? ?></span></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-laptop text-gray-400 mr-2"></i>
                                            <span><?=  $reservation['equipment_id']. ' - '. $reservation['equipment_name'] ?></span>
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
                                            'RESERVED' => 'bg-yellow-100 text-yellow-800',
                                            'RESCHEDULED' => 'bg-blue-100 text-blue-800',
                                            'DONE' => 'bg-green-100 text-green-800',
                                            'CANCELLED' => 'bg-red-100 text-red-800'
                                        ];
                                        $statusColor = $statusColors[$reservation['status']] ?? 'bg-gray-100 text-gray-800';
                                        ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusColor ?>">
                                            <i class="fas fa-circle mr-1 text-xs"></i>
                                            <?= ucfirst($reservation['status']) ?>
                                        </span>
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
                <h2 class="text-2xl font-bold text-gray-800">Your Borrow History</h2>
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
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Borrowed Date</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Return Date</th>
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
                                            <span class="font-medium"><?= '#'.$borrower['user_id'] .' - '.$borrower['username']//fullname? ?></span>
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
                                            <?= $borrower['status'] === 'Returned' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                            <i class="fas fa-circle mr-1 text-xs"></i>
                                            <?= ucfirst($borrower['status']) ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><?= date('M j, Y', strtotime($borrower['borrow_date'])) ?></td>
                                    <td class="py-4 px-4 text-gray-600">
                                        <?= empty($borrower['return_date']) 
                                            ? 'Not returned yet' 
                                            : date('M j, Y', strtotime($borrower['return_date'])) ?>
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
</body>
</html>
<?= $this->endSection() ?>