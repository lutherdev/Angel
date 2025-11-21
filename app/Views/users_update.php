<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
    <div class="bg-white rounded-lg shadow-sm p-6 max-w-4xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h2>
        <form action="<?= base_url('users/update/'. $user['id']); ?>" method="POST">
            <!-- Hidden ID field -->
            <input type="hidden" name="id" value="<?= $user['id'] ?? ''; ?>">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input type="text" id="username" name="username" value="<?= $user['username'] ?? ''; ?>" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="<?= $user['email'] ?? ''; ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="<?= $user['first_name'] ?? ''; ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- Middle Name -->
                <div>
                    <label for="middle_name" class="block text-sm font-semibold text-gray-700 mb-2">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name" value="<?= $user['middle_name'] ?? ''; ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="<?= $user['last_name'] ?? ''; ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                    <select id="role" name="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="Personnel" <?= ($user['role'] ?? '') == 'Personnel' ? 'selected' : ''; ?>>Personnel</option>
                        <option value="Associate" <?= ($user['role'] ?? '') == 'Associate' ? 'selected' : ''; ?>>Associate</option>
                        <option value="God" <?= ($user['role'] ?? '') == 'God' ? 'selected' : ''; ?>>God</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="Active" <?= ($user['status'] ?? '') == 'Active' ? 'selected' : ''; ?>>Active</option>
                        <option value="Inactive" <?= ($user['status'] ?? '') == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mt-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors font-semibold">
                    Update User
                </button>
                <a href="<?= base_url('users'); ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors font-semibold">
                    Cancel
                </a>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>