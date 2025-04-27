<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
                        <h3 class="card-title text-center mb-4">Masuk ke Akun</h3>

                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['error'];
                                unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success'];
                                unset($_SESSION['success']); ?>
                            </div>
                        <?php endif; ?>

                        <form action="/loginAction" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Masuk</button>

                            <div class="text-center mt-3">
                                <small>Belum punya akun? <a href="/register">Daftar sekarang</a></small>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>