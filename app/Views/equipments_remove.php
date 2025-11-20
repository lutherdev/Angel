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
            <p class="text-gray-600 text-lg">Process returns and update inventory</p>
        </section>

        <div class="max-w-2xl mx-auto">

            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-red-600 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-minus-circle mr-2"></i>
                        RETURN EQUIPMENT
                    </h2>
                </div>
                
                <div class="p-6">
                    <form>
                        <div class="mb-6">
                            <label for="return_quantity" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-boxes mr-2 text-red-600"></i>Return Quantity
                            </label>
                            <input 
                                type="number" 
                                name="return_quantity" 
                                id="return_quantity" 
                                required 
                                min="1"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
                                placeholder="Enter quantity to return"
                            >
                        </div>

                        <div class="mb-8">
                            <label for="return_reason" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-comment-alt mr-2 text-red-600"></i>Return Reason
                            </label>
                            <select 
                                name="return_reason" 
                                id="return_reason" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
                            >
                                <option value="">Select return reason</option>
                                <option value="class_completed">Class/Lesson Completed</option>
                                <option value="equipment_damaged">Equipment Damaged</option>
                                <option value="no_longer_needed">No Longer Needed</option>
                                <option value="maintenance">Sent for Maintenance</option>
                                <option value="other">Other Reason</option>
                            </select>
                        </div>

                        <div class="mb-8">
                            <label for="notes" class="block text-gray-700 text-sm font-medium mb-2">
                                <i class="fas fa-sticky-note mr-2 text-red-600"></i>Additional Notes (Optional)
                            </label>
                            <textarea 
                                name="notes" 
                                id="notes" 
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
                                placeholder="Any additional information about the return..."
                            ></textarea>
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="<?= base_url('/equipments') ?>" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back
                            </a>
                            <button 
                                type="button" 
                                class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium flex items-center transition duration-200 shadow-md hover:shadow-lg"
                                onclick="alert('Return functionality would be processed here')"
                            >
                                <i class="fas fa-undo-alt mr-2"></i>
                                Process Return
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