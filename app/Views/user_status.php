<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITSO Equipment Management System</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <!-- Welcome Section -->
        <section class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Welcome to User Management</h1>
            <p class="text-gray-600 text-lg">Choose a module</p>
        </section>

        <div class="bg-white rounded-lg shadow-sm p-6 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit User Status</h2>
            
            <form action="<?= base_url('users/statuschange'); ?>" method="POST">
                <!-- User Selection -->
                <div class="mb-6">
                    <label for="user_id" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-user mr-2 text-green-600"></i>User
                    </label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        value="<?= isset($user['id']) ? esc($user['id']) : '' ?>"
                    >
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-toggle-on mr-2 text-green-600"></i>Status
                    </label>
                    <select id="status" name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
                        <option value="ACTIVE" <?= (isset($user['status']) && $user['status'] == 'ACTIVE') ? 'selected' : ''; ?>>ACTIVE</option>
                        <option value="INACTIVE" <?= (isset($user['status']) && $user['status'] == 'INACTIVE') ? 'selected' : ''; ?>>INACTIVE</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-4 mt-8">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg transition-colors font-semibold">
                        Update Status
                    </button>
                    <a href="<?= base_url('dashboard'); ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors font-semibold">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<?= $this->endSection() ?>