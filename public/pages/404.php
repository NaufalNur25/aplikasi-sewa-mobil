<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="display-1 fw-bold text-danger">404</h1>
        <p class="fs-3"> <span class="text-danger">Oops!</span> Halaman tidak ditemukan.</p>
        <p class="lead">
            Maaf, alamat yang kamu cari tidak tersedia atau mungkin sudah dipindahkan.
        </p>
        <a href="/" class="btn btn-primary">Kembali</a>
    </div>

    <script>
        setTimeout(() => {
            window.location.href = "/";
        }, 5000)
    </script>

</body>

</html>