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

    <!-- Hero Section -->
    <section class="py-5 text-center bg-primary text-white">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di Rental Mobil Online</h1>
            <p class="lead mt-3">Temukan berbagai pilihan mobil terbaik untuk kebutuhan perjalanan Anda.</p>
            <a href="<?= isset($_SESSION['user']) ? '/dashboard' : '/dashboard?user=guest' ?>" class="btn btn-light btn-lg mt-4">Lihat Mobil</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold">Kenapa Memilih Kami?</h2>
            <p class="mt-3">
                Kami menyediakan layanan sewa mobil dengan berbagai pilihan kendaraan yang terawat dan harga bersaing.
                Nikmati perjalanan Anda bersama kami tanpa khawatir!
            </p>
            <div class="row">
                <div class="col-md-4">
                    <h4>Mobil Terawat</h4>
                    <p>Kami menjaga kendaraan kami agar selalu dalam kondisi terbaik, siap menemani perjalanan Anda.</p>
                </div>
                <div class="col-md-4">
                    <h4>Proses Sewa Mudah</h4>
                    <p>Pemesanan mudah dan cepat hanya dengan beberapa klik. Waktu Anda sangat berharga.</p>
                </div>
                <div class="col-md-4">
                    <h4>Harga Bersaing</h4>
                    <p>Dapatkan harga sewa yang bersaing dengan pilihan paket yang fleksibel sesuai kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Pilihan Mobil Unggulan</h2>
            <div class="row">
                <!-- Featured Car 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="<?= asset('suzuki-apv-arena-hitam.png'); ?>" class="card-img-top img-fluid" alt="Suzuki APV">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Suzuki APV</h5>
                            <p class="card-text">Mobil yang luas dan nyaman untuk keluarga. Cocok untuk perjalanan jauh.</p>
                        </div>
                    </div>
                </div>
                <!-- Featured Car 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="<?= asset('avanza-white.png'); ?>" class="card-img-top img-fluid" alt="Toyota Avanza">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Toyota Avanza</h5>
                            <p class="card-text">Mobil kompak dan hemat bahan bakar untuk perjalanan dalam kota.</p>
                        </div>
                    </div>
                </div>
                <!-- Featured Car 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="<?= asset('innova-super-white.png'); ?>" class="card-img-top img-fluid" alt="Toyota Kijang Innova">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Toyota Kijang Innova</h5>
                            <p class="card-text">Kendaraan elegan dan luas untuk perjalanan bisnis maupun keluarga besar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Testimonials Section -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container">
            <h2 class="fw-bold mb-4">Apa Kata Pelanggan?</h2>
            <div class="row">
                <div class="col-md-4">
                    <p>"Sewa mobil di sini sangat mudah dan cepat. Prosesnya tanpa ribet dan mobilnya dalam kondisi baik!" - <strong>Andi</strong></p>
                </div>
                <div class="col-md-4">
                    <p>"Pelayanan yang ramah dan harga yang terjangkau. Mobil yang disewa nyaman dan terawat." - <strong>Maria</strong></p>
                </div>
                <div class="col-md-4">
                    <p>"Saya sering menyewa mobil di sini untuk perjalanan bisnis. Selalu puas dengan kualitasnya!" - <strong>Joko</strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white text-center">
        <div class="container">
            &copy; <?= date('Y'); ?> Rental Mobil Online. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>