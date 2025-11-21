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
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Equipment</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Reserved Date</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Valid Until</th>
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
                                            <span class="font-medium"><?= $reservation['username'] ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-laptop text-gray-400 mr-2"></i>
                                            <span><?= $reservation['equipment_name'] ?? 'Equipment #' . $reservation['equipment_id'] ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><?= date('M j, Y', strtotime($reservation['reserved_date'])) ?></td>
                                    <td class="py-4 px-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            <?= strtotime($reservation['valid_until']) < time() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' ?>">
                                            <?= date('M j, Y', strtotime($reservation['valid_until'])) ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <?php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'confirmed' => 'bg-blue-100 text-blue-800',
                                            'active' => 'bg-green-100 text-green-800',
                                            'completed' => 'bg-gray-100 text-gray-800',
                                            'cancelled' => 'bg-red-100 text-red-800'
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
                                            <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors duration-200" 
                                                    title="View Details"
                                                    onclick="viewReservation(<?= $reservation['reservation_id'] ?>)">
                                                <i class="fas fa-eye w-4 h-4"></i>
                                            </button>
                                            
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200" 
                                                    title="Edit Reservation"
                                                    onclick="editReservation(<?= $reservation['reservation_id'] ?>)">
                                                <i class="fas fa-edit w-4 h-4"></i>
                                            </button>
                                            
                                            <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200" 
                                                    title="Delete Reservation"
                                                    onclick="deleteReservation(<?= $reservation['reservation_id'] ?>)">
                                                <i class="fas fa-trash w-4 h-4"></i>
                                            </button>
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
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Full Name</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Username</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Email</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Role</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($borrowers)): ?>
                            <?php foreach ($borrowers as $borrower): ?>
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4 font-medium text-gray-900">#<?= $borrower['user_id'] ?></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-purple-600 text-xs"></i>
                                            </div>
                                            <span class="font-medium"><?= $borrower['firstname'] . ' ' . $borrower['lastname'] ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600"><?= $borrower['username'] ?></td>
                                    <td class="py-4 px-4 text-gray-600"><?= $borrower['email'] ?></td>
                                    <td class="py-4 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            <?= $borrower['role'] === 'Personnel' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' ?>">
                                            <?= $borrower['role'] ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            <?= $borrower['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                            <i class="fas fa-circle mr-1 text-xs"></i>
                                            <?= ucfirst($borrower['status']) ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex space-x-2">
                                            <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors duration-200" 
                                                    title="View Borrower"
                                                    onclick="viewBorrower(<?= $borrower['user_id'] ?>)">
                                                <i class="fas fa-eye w-4 h-4"></i>
                                            </button>
                                            
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200" 
                                                    title="Update Borrower"
                                                    onclick="updateBorrower(<?= $borrower['user_id'] ?>)">
                                                <i class="fas fa-edit w-4 h-4"></i>
                                            </button>
                                            
                                            <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200" 
                                                    title="Delete Borrower"
                                                    onclick="deleteBorrower(<?= $borrower['user_id'] ?>)">
                                                <i class="fas fa-trash w-4 h-4"></i>
                                            </button>
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

    <div id="addBorrowerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Add New Borrower</h3>
                <button onclick="closeAddBorrowerModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="addBorrowerForm">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Username</label>
                        <input type="text" name="username" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input type="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <input type="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">First Name</label>
                            <input type="text" name="firstname" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Last Name</label>
                            <input type="text" name="lastname" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Role</label>
                        <select name="role" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="">Select Role</option>
                            <option value="Personnel">Personnel</option>
                            <option value="Associate">Associate</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeAddBorrowerModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Add Borrower
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?= $this->endSection() ?>