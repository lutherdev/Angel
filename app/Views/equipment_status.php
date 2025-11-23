<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TW32 App - Edit Equipment Record</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <div class="bg-white rounded-lg shadow-sm p-6 max-w-4xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Equipment</h2>
            <form action="<?= base_url('equipments/statuschange'); ?>" method="POST">
                <input type="hidden" name="id" value="<?= isset($equipment['id']) ? $equipment['id'] : ''; ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                                <option value="<?= esc($equip['id']) ?>" <?= $equip['id'] ? 'selected' : '' ?>>
                                    <?= esc($equip['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="ACTIVE" <?= (isset($equipment['status']) && $equipment['status'] == 'ACTIVE') ? 'selected' : ''; ?>>ACTIVE</option>
                            <option value="INACTIVE" <?= (isset($equipment['status']) && $equipment['status'] == 'INACTIVE') ? 'selected' : ''; ?>>INACTIVE</option>
                        </select>
                    </div>
                </div>
                <div class="flex space-x-4 mt-8">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors font-semibold">
                        Update Equipment
                    </button>
                    <a href="<?= base_url('dashboard'); ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors font-semibold">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>