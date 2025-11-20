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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Add New Equipment</h1>
            <p class="text-gray-600 text-lg">Fill in the details to add equipment to inventory</p>
        </section>

        <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-gradient-to-b from-green-900 to-green-500 p-4 text-white">
                <h2 class="text-xl font-bold flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i>
                    ADD EQUIPMENT
                </h2>
            </div>
            
            <div class="p-6">
                <form action="<?= base_url('equipments/insert') ?>" method="post">

                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-tag mr-2 text-green-600"></i>Equipment Name
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                            placeholder="Enter equipment name"
                        >
                    </div>

                    <div class="mb-8">
                        <label for="description" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-align-left mr-2 text-green-600"></i>Description
                        </label>
                        <input 
                            type="text" 
                            name="description" 
                            id="description" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                            placeholder="Description"
                        >
                    </div>

                    <div class="mb-8">
                        <label for="quantity" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-boxes mr-2 text-green-600"></i>Quantity
                        </label>
                        <input 
                            type="number" 
                            name="quantity" 
                            id="quantity" 
                            required 
                            min="1"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                            placeholder="Enter quantity"
                        >
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="<?= base_url('/equipments') ?>" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back
                        </a>
                        <button 
                            type="submit" 
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium flex items-center transition duration-200 shadow-md hover:shadow-lg"
                        >
                            <i class="fas fa-plus mr-2"></i>
                            Add Equipment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>