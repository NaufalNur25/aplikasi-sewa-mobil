<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar bg-body-tertiary navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand">Rental Mobil Online</a>
            <a href="/dashboard?user=guest" class="btn btn-outline-secondary btn-lg px-5">Lihat mobil</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Formulir Pendaftaran</h3>

                        <form action="/registerAction" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="fullname" class="form-control" value="<?php echo isset($_SESSION['old_data']['fullname']) ? htmlspecialchars($_SESSION['old_data']['fullname']) : ''; ?>" required>
                                <?php if (isset($_SESSION['error']['fullname'])) {
                                    echo '<small class="text-danger">' . $_SESSION['error']['fullname'] . '</small>';
                                } ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo isset($_SESSION['old_data']['email']) ? htmlspecialchars($_SESSION['old_data']['email']) : ''; ?>" required>
                                <?php if (isset($_SESSION['error']['email'])) {
                                    echo '<small class="text-danger">' . $_SESSION['error']['email'] . '</small>';
                                } ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo isset($_SESSION['old_data']['phone']) ? htmlspecialchars($_SESSION['old_data']['phone']) : ''; ?>" required>
                                <?php if (isset($_SESSION['error']['phone'])) {
                                    echo '<small class="text-danger">' . $_SESSION['error']['phone'] . '</small>';
                                } ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="photo" accept="image/*" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" required>
                                <?php if (isset($_SESSION['error']['confirm'])) {
                                    echo '<small class="text-danger">' . $_SESSION['error']['confirm'] . '</small>';
                                } ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Daftar</button>

                            <div class="text-center mt-3">
                                <small>Sudah punya akun? <a href="/">Login di sini</a></small>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>