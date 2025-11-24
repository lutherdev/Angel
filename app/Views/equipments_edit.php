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
            <form action="<?= base_url('equipments/update/'. $equipment['id']); ?>" method="POST">
                <input type="hidden" name="id" value="<?= isset($equipment['id']) ? $equipment['id'] : ''; ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Equipment Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Equipment Name</label>
                        <input type="text" id="name" name="name" value="<?= isset($equipment['name']) ? $equipment['name'] : ''; ?>" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                        <input type="text" id="category" name="category" value="<?= isset($equipment['category']) ? $equipment['category'] : ''; ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?= isset($equipment['description']) ? $equipment['description'] : ''; ?></textarea>
                    </div>

                    <!-- Quantity -->
                    <div>
                        <label for="quantity" class="block text-sm font-semibold text-gray-700 mb-2">Total Quantity</label>
                        <input type="number" id="quantity" name="quantity" value="<?= isset($equipment['quantity']) ? $equipment['quantity'] : ''; ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required min="0">
                    </div>

                    <!-- Available Count -->
                    <div>
                        <label for="avail_count" class="block text-sm font-semibold text-gray-700 mb-2">Available Count</label>
                        <input type="number" id="avail_count" name="avail_count" value="<?= isset($equipment['avail_count']) ? $equipment['avail_count'] : ''; ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required min="0">
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
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