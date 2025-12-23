<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Washway Registration</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=Inria+Sans&display=swap');

    html,
    body {
        margin: 0;
        height: 100%;
        font-family: 'Fredoka One', 'Inria Sans', cursive;
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
        padding: 64px 28px 80px;
        /* beri bottom padding lebih agar tombol tidak menempel */
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(108, 168, 184, 0.56);
        overflow: hidden;
        color: black;
        background-color: rgba(99, 174, 208, 0.68);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
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
        cursor: pointer;
        transition: color 0.3s ease;
        border: none;
        background: none;
        z-index: 10;
        text-decoration: none;
    }

    .back-button:hover {
        color: #1d4ed8;
    }

    .title {
        font-size: 66px;
        font-weight: 363;
        user-select: none;
        display: flex;
        gap: 8px;
        justify-content: center;
        margin-bottom: 40px;
    }

    .wash,
    .way {
        position: relative;
        user-select: none;
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
        text-stroke: 2px white;
        z-index: -1;
        user-select: none;
        pointer-events: none;
    }

    form {
        position: relative;
        /* agar tombol absolute relatif pada form */
        padding-bottom: 60px;
        /* beri ruang di bawah untuk tombol */
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-family: 'Inria Sans', sans-serif;
        font-size: 1rem;
        background-color: rgba(236, 198, 198, 0.7);
        /* transparan 70% */
        color: black;
        /* supaya teks tetap jelas */
    }

    .btn {
        font-family: 'Inria Sans', sans-serif;
        position: absolute;
        bottom: 16px;
        right: 16px;
        background-color: rgba(252, 165, 165, 0.6);
        color: black;
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
        user-select: none;
        text-decoration: none;
        width: auto;
        margin-bottom: 0;
    }

    .btn:hover {
        background-color: rgba(251, 113, 134, 0.48);
    }

    .subtitle {
        text-align: center;
        font-family: 'Inria Sans', sans-serif;
        margin-bottom: 24px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <a href="home.php" aria-label="Back" class="back-button">
                <i class="fas fa-backward"></i>
            </a>
            <h1 class="title">
                <span class="wash" data-text="WASH">WASH</span>
                <span class="way" data-text="WAY">WAY</span>
            </h1>
            <p class="subtitle">Registrasi Akun Pelanggan</p>
            <form action="register_ui.php" method="post" name="add">
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="submit" class="btn"></input>
            </form>
        </div>
    </div>
</body>

</html>