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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">View Borrowing Record</h1>
            <p class="text-gray-600 text-lg">Borrowing details</p>
        </section>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-purple-600 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-eye mr-2"></i>
                        BORROWING DETAILS
                    </h2>
                </div>
                
                <div class="p-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-hashtag mr-2 text-purple-600"></i>Borrow ID
                            </label>
                            <p class="text-gray-900 font-semibold text-lg">B001</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-barcode mr-2 text-purple-600"></i>Equipment ID
                            </label>
                            <p class="text-gray-900">101</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-user mr-2 text-purple-600"></i>Username
                            </label>
                            <p class="text-gray-900">john_doe</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-boxes mr-2 text-purple-600"></i>Quantity
                            </label>
                            <p class="text-gray-900">2</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-calendar-alt mr-2 text-purple-600"></i>Borrow Date
                            </label>
                            <p class="text-gray-900">December 10, 2023</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-calendar-check mr-2 text-purple-600"></i>Return Date
                            </label>
                            <p class="text-gray-900">December 17, 2023</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-info-circle mr-2 text-purple-600"></i>Status
                            </label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                                <i class="fas fa-clock mr-1"></i>
                                Borrowed
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
                        <a href="<?= base_url('/borrowings') ?>" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to List
                        </a>
                        <a href="<?= base_url('/borrowings/edit/B001') ?>" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-medium flex items-center transition duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Record
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>