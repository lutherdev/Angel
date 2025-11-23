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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Welcome to Equipment Management</h1>
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
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <!-- Database Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-yellow-500 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-database mr-2"></i>
                        EQUIPMENT DATABASE
                    </h2>
                </div>
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-3 text-left">ID</th>
                                    <th class="py-2 px-3 text-left">ITEM NAME</th>
                                    <th class="py-2 px-3 text-left">QUANTITY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($equipments as $eqp): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-3"><?= $eqp['id']; ?></td>
                                    <td class="py-2 px-3"><?= $eqp['name']; ?></td>
                                    <td class="py-2 px-3"><?= $eqp['quantity']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Equipment Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('equipments/add'); ?>" class="text-decoration-none">
                    <div class="bg-green-800 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            ADD EQUIPMENT
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-green-100 p-4 rounded-full mb-4">
                            <i class="fas fa-laptop text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Add Equipment</h3>
                        <p class="text-gray-600 mb-6">Borrow laptops, DLPs, cables & more</p>
                    </div>
                </a>
            </div>

            <!-- Activate Equipment Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('equipments/activate'); ?>" class="text-decoration-none">
                    <div class="bg-blue-600 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-power-off mr-2"></i>
                            ACTIVATE EQUIPMENT
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-blue-100 p-4 rounded-full mb-4">
                            <i class="fas fa-toggle-on text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Activate</h3>
                    </div>
                </a>
            </div>

            <!-- Deactivate Equipment Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('equipments/deactivate'); ?>" class="text-decoration-none">
                    <div class="bg-orange-600 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-ban mr-2"></i>
                            DEACTIVATE EQUIPMENT
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-orange-100 p-4 rounded-full mb-4">
                            <i class="fas fa-toggle-off text-orange-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deactivate</h3>
                    </div>
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('borrow'); ?>" class="text-decoration-none">
                    <div class="bg-green-800 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            BORROW EQUIPMENT
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-green-100 p-4 rounded-full mb-4">
                            <i class="fas fa-laptop text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Borrow Equipment</h3>
                        <p class="text-gray-600 mb-6">Borrow laptops, DLPs, cables & more</p>
                    </div>
                </a>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('reserve'); ?>" class="text-decoration-none">
                    <div class="bg-green-800 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            RESERVE EQUIPMENT
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-green-100 p-4 rounded-full mb-4">
                            <i class="fas fa-laptop text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Reserve Equipment</h3>
                        <p class="text-gray-600 mb-6">Reserve laptops, DLPs, cables & more</p>
                    </div>
                </a>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <a href="<?php echo base_url('return'); ?>" class="text-decoration-none">
                    <div class="bg-green-800 p-4 text-white">
                        <h2 class="text-xl font-bold flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            RETURN EQUIPMENT
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center h-full">
                        <div class="bg-green-100 p-4 rounded-full mb-4">
                            <i class="fas fa-laptop text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Return Equipment</h3>
                        <p class="text-gray-600 mb-6">Return laptops, DLPs, cables & more</p>
                    </div>
                </a>
            </div>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>