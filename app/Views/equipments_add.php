<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITSO Users Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="text-center mb-4">
            <h1 class="fw-bold">Welcome to Equipment Manage</h1>
            <p class="text-secondary">Choose a module to continue</p>
        </div>

        <div class="row g-4 justify-content-center">

    <h1>Add New User</h1>

    <form action="<?= base_url('equipments/insert') ?>" method="post">
        <div>
            <label for="username">Name:</label>
            <input type="text" name="name" id="name" value="" required>
        </div>

        <div>
            <label for="password">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required>
        </div>

        <button type="submit">Add Equipment</button>
    </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?= $this->endSection() ?>
