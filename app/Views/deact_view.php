<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deactivate Account - ITSO Equipment Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
      body {
          font-family: 'Poppins', sans-serif;
      }
    </style>
  </head>
  <body class="bg-gray-50 min-h-screen">
    <main class="container mx-auto px-4 py-8">

      <!-- HEADER TEXT -->
      <section class="text-center mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Deactivate Account</h1>
        <p class="text-lg text-gray-600">Confirm your identity to deactivate this account</p>

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
      </section>

      <!-- CARD -->
      <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">

          <div class="bg-gradient-to-b from-red-700 to-red-500 p-4 text-white">
            <h2 class="text-xl font-bold flex items-center">
              <i class="fas fa-user-slash mr-2"></i>
              DEACTIVATE ACCOUNT
            </h2>
          </div>

          <div class="p-6">
            <form action="<?= base_url('/deactivate') ?>" method="POST">

              <!-- Password Confirmation -->
              <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-lock mr-2 text-red-600"></i>Enter Password to Confirm
                </label>
                <input
                  type="password"
                  name="password"
                  id="password"
                  required
                  placeholder="Enter your password"
                  class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none"
                />
              </div>

              <!-- WARNING BOX -->
              <div class="bg-yellow-100 text-yellow-800 p-3 rounded-lg text-sm mb-6 flex items-start">
                <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                <p>
                  Deactivating this account will prevent the user from logging in or using any system features.<br>
                  This action can be reversed only by ITSO personnel.
                </p>
              </div>

              <!-- BUTTONS -->
              <div class="flex justify-between items-center">
                <a href="<?= base_url('user/profile') ?>" class="flex items-center text-gray-600 hover:text-gray-800 font-medium">
                  <i class="fas fa-arrow-left mr-2"></i>Back
                </a>

                <button 
                  type="submit"
                  class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium shadow-md hover:shadow-lg flex items-center"
                >
                  <i class="fas fa-user-slash mr-2"></i>
                  Deactivate Account
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
