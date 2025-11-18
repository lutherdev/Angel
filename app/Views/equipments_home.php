<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITSO Equipment Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="text-center mb-4">
            <h1 class="fw-bold">Welcome to Equipments Manage</h1>
            <p class="text-secondary">Choose a module to continue</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- ADD ACTION BUTTONS (VIEW, EDIT, DELETE) -->
            <div class="col-md-3"> 
                <h2>DATABASE</h2>
                <?="ID -- ITEM NAME -- QUANTITY"?>
                <?php foreach ($equipments as $eqp): ?>
                    <p><?= $eqp['id']; ?> - <?= $eqp['name']; ?> - <?= $eqp['quantity']; ?></p>
                <?php endforeach; ?>
            </div>

            <!-- ADD -->
            <div class="col-md-3">
                <a href="<?php echo base_url('equipments/add'); ?>" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4 h-100">
                        <h4 class="fw-bold text-warning">Add</h4>
                        <p class="text-muted">Borrow laptops, DLPs, cables & more</p>
                    </div>
                </a>
            </div>

            <!-- RETURN -->
            <div class="col-md-3">
                <a href="<?php echo base_url('return'); ?>" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4 h-100">
                        <h4 class="fw-bold text-danger">Remove</h4>
                        <p class="text-muted">Return borrowed equipment</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?= $this->endSection() ?>
