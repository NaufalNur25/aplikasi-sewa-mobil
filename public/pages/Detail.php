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

        <form action="/sewa-mobil/proses" method="POST">
            <div class="row">
                <!-- Form Identitas Penyewa -->
                <div class="col-md-7 mb-4">
                    <h4 class="mb-4 fw-bold">Identitas Penyewa</h4>
                    <div class="mb-3">
                        <label for="nik" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan..." required>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= isset($user['fullname']) ? $user['fullname'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Domisili</label>
                        <textarea class="form-control" id="address" name="address" rows="4" placeholder="Alamat tempat tinggal saat ini..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Telp/Whatsapp Aktif</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($user['phone']) ? $user['phone'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= isset($user['email']) ? $user['email'] : ''; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label d-block">Jenis Pembayaran</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="transfer" value="transfer" checked>
                            <label class="form-check-label" for="transfer">Transfer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="tunai" value="tunai">
                            <label class="form-check-label" for="tunai">Tunai</label>
                        </div>
                    </div>
                </div>

                <!-- Detail Mobil -->
                <div class="col-md-5 mb-4">
                    <h4 class="text-center mb-4">
                        <input type="text" name="carName" class="text-center fw-bold border-0 bg-transparent" value="<?= $nama ?>" />
                    </h4>

                    <div class="mb-4">
                        <img src="<?= asset($gambar) ?>" alt="Toyota Avanza" class="img-fluid rounded">
                    </div>
                    <div class="text-center mb-4">
                        <h5 class="fw-bold"><?= $harga ?> / Hari</h5>
                    </div>
                    <div class="mb-3">
                        <label for="plat" class="form-label">Nomor Kendaraan (tersedia)</label>
                        <input type="text" class="form-control" id="plat" value="<?= $nomorKendaraan ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Supir</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isWithSupir" id="supirYa" value="ya" checked>
                            <label class="form-check-label" for="supirYa">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isWithSupir" id="supirTidak" value="tidak">
                            <label class="form-check-label" for="supirTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="lamaSewa" class="form-label">Lama Sewa</label>
                        <select class="form-select" id="lamaSewa" name="lamaSewa" required>
                            <option value="" disabled selected>-- Lama Menyewa --</option>
                            <?php
                            for ($i = 1; $i <= 4; $i++) {
                                echo '<option value="' . $i . '">' . $i . ' Hari</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary w-100" type="submit">Sewa sekarang!</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>