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
<body class="bg-gray-50 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <section class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Return Equipment</h1>
        </section>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-gradient-to-b from-green-900 to-yellow-500 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-undo-alt mr-2"></i>
                        RETURN EQUIPMENT
                    </h2>
                </div>
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
                <div class="p-6">
                    <form action="<?= base_url('return/return') ?>" method="post">
                        <div class="mb-6">
                            <label for="id" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-barcode mr-2 text-green-600"></i>Equipment ID
                            </label>
                            <input 
                                type="number" 
                                name="equipment_id" 
                                id="id" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                                placeholder="Enter equipment ID"
                            >
                        </div>

                        <div class="mb-6">
                            <label for="username" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-barcode mr-2 text-green-600"></i>Username
                            </label>
                            <input 
                                type="text" 
                                name="username" 
                                id="username" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                                placeholder="Enter Username"
                            >
                        </div>

                        <div class="mb-6">
                            <label for="return_date" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-calendar-alt mr-2 text-green-600"></i>Return Date
                            </label>
                            <input 
                                type="date" 
                                name="return_date" 
                                id="return_date" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                                value="<?= date('Y-m-d') ?>"
                            >
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="<?= base_url('/') ?>" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back
                            </a>
                            <button 
                                type="submit" 
                                class="bg-gradient-to-r from-green-600 to-yellow-500 hover:from-green-700 hover:to-yellow-600 text-white px-6 py-3 rounded-lg font-medium flex items-center transition duration-200 shadow-md hover:shadow-lg"
                            >
                                <i class="fas fa-undo-alt mr-2"></i>
                                Return Equipment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>