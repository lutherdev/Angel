<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TW32 App - Edit User Record</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="flex-1 p-8">
        <div class="bg-white rounded-lg shadow-sm p-6 max-w-4xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h2>
            <form action="<?= base_url('users/update/'. $user['id']); ?>" method="POST">
                <input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : ''; ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                        <input type="text" id="username" name="username" value="<?= isset($user['username']) ? $user['username'] : ''; ?>" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" value="<?= isset($user['email']) ? $user['email'] : ''; ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-500" readonly>
                    </div>

                    <div>
                        <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?= isset($user['first_name']) ? $user['first_name'] : ''; ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    </div>

                    <div>
                        <label for="middle_name" class="block text-sm font-semibold text-gray-700 mb-2">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" value="<?= isset($user['middle_name']) ? $user['middle_name'] : ''; ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?= isset($user['last_name']) ? $user['last_name'] : ''; ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                        <select id="role" name="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-500" readonly disabled>
                            <option value="Personnel" <?= (isset($user['role']) && $user['role'] == 'Personnel') ? 'selected' : ''; ?>>Personnel</option>
                            <option value="Associate" <?= (isset($user['role']) && $user['role'] == 'Associate') ? 'selected' : ''; ?>>Associate</option>
                            <option value="God" <?= (isset($user['role']) && $user['role'] == 'God') ? 'selected' : ''; ?>>God</option>
                        </select>
                    </div>
                    
                </div>

                <div class="flex space-x-4 mt-8">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors font-semibold">
                        Update User
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