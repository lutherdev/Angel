
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ITSO Equipment Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
      body {
          font-family: 'Poppins', sans-serif;
      }
    </style>
  </head>
  <body class="min-h-screen bg-gray-50">
    <main class="container mx-auto px-4 py-8">
      <section class="mb-8 text-center">
        <h1 class="mb-2 text-3xl font-bold text-gray-800 md:text-4xl">Reset Password</h1>
        <p class="text-lg text-gray-600">Update user password</p>
      </section>

      <div class="mx-auto max-w-2xl">
        <div class="mb-8 overflow-hidden rounded-xl bg-white shadow-md">
          <div class="bg-gradient-to-b from-green-900 to-yellow-500 p-4 text-white">
            <h2 class="flex items-center text-xl font-bold">
              <i class="fas fa-key mr-2"></i>
              PASSWORD RESET
            </h2>
          </div>

          <div class="p-6">
            <form action="<?= base_url('reset/'.$token) ?>" method="POST">

              <div class="mb-6">
                <label for="new_password" class="mb-2 block text-sm font-medium text-gray-700"> <i class="fas fa-lock mr-2 text-green-600"></i>New Password </label>
                <input type="password" name="new_password" id="new_password" required class="w-full rounded-lg border border-gray-300 px-4 py-3 transition duration-200 focus:border-transparent focus:ring-2 focus:ring-green-500 focus:outline-none" placeholder="Enter new password" />
              </div>

              <div class="mb-8">
                <label for="confirm_password" class="mb-2 block text-sm font-medium text-gray-700"> <i class="fas fa-lock mr-2 text-green-600"></i>Confirm New Password </label>
                <input type="password" name="confirm_password" id="confirm_password" required class="w-full rounded-lg border border-gray-300 px-4 py-3 transition duration-200 focus:border-transparent focus:ring-2 focus:ring-green-500 focus:outline-none" placeholder="Confirm new password" />
              </div>

              <div class="flex items-center justify-between">
                <button type="submit" class="flex items-center rounded-lg bg-green-600 px-6 py-3 font-medium text-white shadow-md transition duration-200 hover:bg-yellow-500 hover:shadow-lg">
                  <i class="fas fa-sync-alt mr-2"></i>
                  Change Password
                </button>
              </div>
              <!-- Success/Error Messages -->
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
            </form>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

