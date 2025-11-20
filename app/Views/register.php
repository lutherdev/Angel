<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITSO Users Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">REGISTER</h1>
            <p class="text-secondary">Please fill in required details</p>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                <?php endif; ?>
        </div>

        <div class="row g-4 justify-content-center">
            <form action="<?= base_url('auth/register')?>" method="post" novalidate>
                <label>Username: </label>
                <input type="text" name="username" required>

                <label>Password: </label>
                <input type="password" name="password" required>

                <label>Email: </label>
                <input type="email" name="email" required>

                <label>First Name: </label>
                <input type="text" name="firstname" required>

                <label>Middle Name: </label>
                <input type="text" name="middlename" required>

                <label>Last Name: </label>
                <input type="text" name="lastname" required>

                <label>Role: </label>
                <select name="role" required>
                <option value="">Select role</option>
                <option value="Personnel">Personnel</option>
                <option value="Associate">Associate</option>
                </select>

                <button type="submit">Register</button>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
