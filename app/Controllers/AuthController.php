<?php

namespace App\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        $this->view("Login");
    }

    public function register()
    {
        $this->view("Register");
    }

    public function registerAction()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['error']) || !is_array($_SESSION['error'])) {
            $_SESSION['error'] = [];
        }

        $fullname   = $_POST['fullname'] ?? '';
        $email      = $_POST['email'] ?? '';
        $phone      = $_POST['phone'] ?? '';
        $password   = $_POST['password'] ?? '';
        $confirm    = $_POST['password_confirmation'] ?? '';
        $photo      = $_FILES['photo'] ?? null;

        if (!$fullname || !$email || !$phone || !$password || !$confirm) {
            if (!$fullname) $_SESSION['error']['fullname'] = "Field nama lengkap wajib diisi.";
            if (!$email) $_SESSION['error']['email'] = "Field email wajib diisi.";
            if (!$phone) $_SESSION['error']['phone'] = "Field nomor telepon wajib diisi.";

            $_SESSION['old_data'] = $_POST;
            header("Location: /register");
            exit;
        }

        if ($password !== $confirm) {
            $_SESSION['error']['confirm'] = "Konfirmasi kata sandi tidak sesuai.";
            $_SESSION['old_data'] = $_POST;
            header("Location: /register");
            exit;
        }

        $photoName = '';
        if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
            $originalName = basename($photo['name']);
            $cleanName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $originalName);
            $photoName = uniqid() . "_" . $cleanName;

            $targetPath = __DIR__ . "/../../public/uploads/" . $photoName;
            move_uploaded_file($photo['tmp_name'], $targetPath);
        }


        $user = [
            'fullname' => $fullname,
            'email' => $email,
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'photo' => $photoName
        ];

        $_SESSION['users'][$email] = $user;

        $_SESSION['success'] = "Pendaftaran berhasil. Silakan login.";
        unset($_SESSION['old_data']);
        unset($_SESSION['error']);
        header("Location: /login");
        exit;
    }



    public function loginAction()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $remember = isset($_POST['remember']);

        if (!isset($_SESSION['users'][$email])) {
            $_SESSION['error'] = "Email/Kata sandi salah.";
            header("Location: /login");
            exit;
        }

        $user = $_SESSION['users'][$email];

        if (!password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Email/Kata sandi salah.";
            header("Location: /login");
            exit;
        }

        $_SESSION['user'] = $user;

        if ($remember) {
            $cookieData = json_encode($user);
            setcookie('remember_user', $cookieData, time() + (86400 * 30), "/");
        }

        header("Location: /dashboard");
        exit;
    }
}
