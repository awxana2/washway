<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    // Cek data pengguna
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
       $_SESSION['user_id'] = $user['id'];
$_SESSION['email'] = $user['email'];
$_SESSION['role'] = $user['role'];
$_SESSION['nama'] = $user['email']; // PENTING agar proses_pesanan.php tidak redirect ke login

        // Redirect berdasarkan role
       
         if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else if ($user['role'] == 'kurir'){
            header("Location: jemputantar_ui.php");
    } else {
            header("Location: pesanan_ui.php");
        }
        exit();
    } else {
        $error = "Email, password, atau role salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Washway</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Inria+Sans&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    html,
    body {
        margin: 0;
        height: 100%;
        font-family: 'Inria Sans', 'sans-serif';
        background-image: url('img/bg-about.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .container {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 16px;
    }

    .card {
        position: relative;
        max-width: 400px;
        width: 100%;
        padding: 48px 28px 32px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(108, 168, 184, 0.56);
        color: black;
        background-color: rgba(99, 174, 208, 0.68);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        overflow: hidden;
    }

    .card::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url('img/rbpl3.jpg');
        background-size: cover;
        background-position: center;
        filter: blur(10px);
        transform: scale(1.1);
        z-index: 0;
    }

    .card::after {
        content: "";
        position: absolute;
        inset: 0;
        background-color: rgba(99, 174, 208, 0.4);
        z-index: 1;
    }

    .card>* {
        position: relative;
        z-index: 2;
    }

    .back-button {
        position: absolute;
        top: 16px;
        left: 16px;
        font-size: 24px;
        color: black;
        background: none;
        border: none;
        cursor: pointer;
        z-index: 3;
    }

    .back-button:hover {
        color: #1d4ed8;
    }

    .title {
        font-family: 'Fredoka One', cursive;
        font-size: 56px;
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-bottom: 32px;
        user-select: none;
    }

    .wash,
    .way {
        position: relative;
    }

    .wash {
        color: #2A79B2;
    }

    .way {
        color: #6AAFE0;
    }

    .wash::before,
    .way::before {
        content: attr(data-text);
        position: absolute;
        top: 0;
        left: 0;
        color: white;
        -webkit-text-stroke: 2px white;
        z-index: -1;
        pointer-events: none;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    input[type="email"],
    input[type="password"],
    select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        box-sizing: border-box;
        border: none;
        font-size: 1rem;
        background-color: rgba(233, 120, 120, 0.44);
        outline: none;
    }

    input:focus,
    select:focus {
        outline: 2px solid rgba(216, 110, 179, 0.57);
    }

    .btn {
        width: 100%;
        background-color: rgba(252, 165, 165, 0.6);
        color: black;
        padding: 12px 0;
        border-radius: 12px;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: rgba(251, 113, 134, 0.48);
    }

    form p {
        font-size: 0.9rem;
        text-align: center;
        margin-top: 4px;
    }

    form a {
        color: black;
        text-decoration: underline;
    }

    form a:hover {
        color: #1d4ed8;
    }

    .error {
        background-color: #ffdddd;
        color: red;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 16px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <button class="back-button" onclick="window.history.back();">
                <i class="fas fa-arrow-left"></i>
            </button>

            <h1 class="title">
                <span class="wash" data-text="WASH">WASH</span>
                <span class="way" data-text="WAY">WAY</span>
            </h1>

            <?php if (isset($error)) : ?>
            <div class="error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">Login</button>
                <p>Belum punya akun? <a href="register_pelanggan.php">Klik di sini</a></p>
            </form>
            <a href="input_pesanan.php">

                </form>
        </div>
    </div>
</body>

</html>