<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$user = $_SESSION['user'];

function getUserPhoto($photo)
{
    return !empty($photo)
        ? "/public/uploads/" . htmlspecialchars($photo)
        : "/public/images/profile-image.jpg";
}

$tanggalLahir = new DateTime($user['birthdate']);
$formatter = new IntlDateFormatter(
    'id_ID',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Asia/Jakarta',
    IntlDateFormatter::GREGORIAN
);
$birthdateFormatted = $formatter->format($tanggalLahir);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow border-0">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Selamat Datang, <?= htmlspecialchars($user['fullname']) ?></h3>

                        <div class="row align-items-center">
                            <div class="col-md-4 text-center">
                                <img src="<?= getUserPhoto($user['photo']) ?>" alt="Foto Profil" class="img-thumbnail" width="150">
                            </div>


                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></li>
                                    <li class="list-group-item"><strong>Nomor Telepon:</strong> <?= htmlspecialchars($user['phone']) ?></li>
                                    <li class="list-group-item">
                                        <strong>Tanggal Lahir:</strong> <?= htmlspecialchars($birthdateFormatted) ?>
                                    </li>
                                    <li class="list-group-item"><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($user['gender']) ?></li>
                                </ul>

                                <div class="mt-4">
                                    <a href="/logout" class="btn btn-outline-danger ms-2 px-5">Logout</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>