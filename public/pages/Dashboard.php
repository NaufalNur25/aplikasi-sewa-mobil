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
    <title>Dashboard</title>
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
        <h1 class="text-center mb-5">Rental Mobil Online</h1>

        <div class="row justify-content-center">

            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="<?= asset('suzuki-apv-arena-hitam.png'); ?>" class="card-img-top" alt="Suzuki APV">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title">Suzuki APV</h5>
                        <ul class="list-unstyled flex-grow-1">
                            <li>Tidak termasuk Supir</li>
                            <li>Tidak termasuk BBM</li>
                            <li>Tidak termasuk Parkir</li>
                            <li>Tidak termasuk TOL</li>
                        </ul>
                        <div class="bg-secondary text-white py-2 rounded mt-3">
                            <a href="/sewa-mobil?mobil=Suzuki APV" class="text-white text-decoration-none d-block">Rp 350.000 / Hari</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="<?= asset('avanza-white.png'); ?>" class="card-img-top" alt="Toyota Avanza">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title">Toyota Avanza</h5>
                        <ul class="list-unstyled flex-grow-1">
                            <li>Tidak termasuk Supir</li>
                            <li>Tidak termasuk BBM</li>
                            <li>Tidak termasuk Parkir</li>
                            <li>Tidak termasuk TOL</li>
                        </ul>
                        <div class="bg-secondary text-white py-2 rounded mt-3">
                            <a href="/sewa-mobil?mobil=Toyota Avanza" class="text-white text-decoration-none d-block">Rp 450.000 / Hari</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="<?= asset('innova-super-white.png'); ?>" class="card-img-top" alt="Toyota Kijang Innova">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title">Toyota Kijang Innova</h5>
                        <ul class="list-unstyled flex-grow-1">
                            <li>Tidak termasuk Supir</li>
                            <li>Tidak termasuk BBM</li>
                            <li>Tidak termasuk Parkir</li>
                            <li>Tidak termasuk TOL</li>
                        </ul>
                        <div class="bg-secondary text-white py-2 rounded mt-3">
                            <a href="/sewa-mobil?mobil=Toyota Kijang Innova" class="text-white text-decoration-none d-block">Rp 600.000 / Hari</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>