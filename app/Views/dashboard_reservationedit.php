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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Edit Reservation</h1>
            <p class="text-gray-600 text-lg">Update reservation details</p>
        </section>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-gradient-to-b from-green-900 to-yellow-500 p-4 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        EDIT RESERVATION
                    </h2>
                </div>
                
                <div class="p-6">
                     <form action="<?= base_url('reservation/update/' . $reservation['reservation_id']) ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-6">
                        <label for="reservation_id" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-hashtag mr-2 text-green-600"></i>Reservation ID
                        </label>
                        <input 
                            type="text" 
                            name="reservation_id" 
                            id="reservation_id" 
                            value="<?= esc($reservation['reservation_id']) ?>" 
                            readonly
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500"
                        />
                    </div>

                    <!-- User Selection -->
                    <div class="mb-6">
                        <label for="user_id" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-user mr-2 text-green-600"></i>User
                        </label>
                        <select 
                            name="user_id" 
                            id="user_id" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        >
                            <?php foreach ($users as $user): ?>
                                <option value="<?= esc($user['id']) ?>" <?= $user['id'] == $reservation['user_id'] ? 'selected' : '' ?>>
                                    <?= esc($user['username']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Equipment Selection -->
                    <div class="mb-6">
                        <label for="equipment_id" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-barcode mr-2 text-green-600"></i>Equipment
                        </label>
                        <select 
                            name="equipment_id" 
                            id="equipment_id" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        >
                            <?php foreach ($equipments as $equip): ?>
                                <option value="<?= esc($equip['id']) ?>" <?= $equip['id'] == $reservation['equipment_id'] ? 'selected' : '' ?>>
                                    <?= esc($equip['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="reserved_date" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-calendar-alt mr-2 text-green-600"></i>Reserved Date
                        </label>
                        <input 
                            type="date" 
                            name="reserved_date" 
                            id="reserved_date" 
                            value="<?= date('Y-m-d', strtotime($reservation['reserved_date'])) ?>"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        />
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-info-circle mr-2 text-green-600"></i>Status
                        </label>
                        <select 
                            name="status" 
                            id="status" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        >
                            <option value="reserved" <?= $reservation['status'] == 'reserved' ? 'selected' : '' ?>>Reserved</option>
                            <option value="cancelled" <?= $reservation['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            <option value="rescheduled" <?= $reservation['status'] == 'rescheduled' ? 'selected' : '' ?>>Rescheduled</option>
                        </select>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="<?= base_url('reservation/view/' . $reservation['reservation_id']) ?>" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back
                        </a>
                        <button 
                            type="submit" 
                            class="bg-green-600 hover:bg-yellow-500 text-white px-6 py-3 rounded-lg font-medium flex items-center transition duration-200 shadow-md hover:shadow-lg"
                        >
                            <i class="fas fa-save mr-2"></i>
                            Update Record
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