<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

function asset($image)
{
    return "/public/images/" . $image;
}

$nav = !isset($user['email'])
    ? '<a href="/login" class="btn btn-outline-primary btn-lg px-5">Login</a>'
    : '<a href="/logout" class="btn btn-outline-danger btn-lg px-5">Logout</a>';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= "Sewa Mobil | {$nama}" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar bg-body-tertiary navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand">Rental Mobil Online</a>
            <?= $nav ?>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="text-center mb-5 fw-bold">Rental Mobil Online</h1>

        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <p>Terimakasih kami ucapkan kepada Yth Sdr <strong><?= $fullname ?></strong> yang beralamat di <strong><?= $address ?></strong> dengan no telp <strong><?= $phone ?></strong> yang telah menggunakan jasa kami. Kendaraan yang anda pesan adalah:</p>

                <table class="table table-sm table-borderless mt-4" style="font-size: 13px;">
                    <tbody>
                        <tr>
                            <th scope="row">Merk/Mobil</th>
                            <td><?= $carBrands ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Biaya Sewa</th>
                            <td><?= $carPrice ?>/hari</td>
                        </tr>
                        <tr>
                            <th scope="row">Lama Sewa</th>
                            <td><?= $rental ?> Hari</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Biaya Sewa</th>
                            <td><?= $totalCarPrice ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Extra Supir</th>
                            <td><?= $isWithSupir ?></td>
                        </tr>
                        <?php if ($isWithSupir == 'ya'): ?>
                            <tr>
                                <th scope="row">Biaya Supir</th>
                                <td>Rp 100,000.00 / Hari</td>
                            </tr>
                            <tr>
                                <th scope="row">Total Biaya Supir</th>
                                <td><?= $totalDriverPrice ?></td>
                            </tr>
                        <?php endif; ?>

                        <tr class="table-primary">
                            <th scope="row">Total Sewa</th>
                            <td><strong><?= $total ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="/" class="btn btn-primary w-100" style="max-width: 500px;">Kembali ke landing page</a>
        </div>
    </div>

</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>