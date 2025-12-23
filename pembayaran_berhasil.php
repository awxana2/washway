<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pembayaran Berhasil</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Inria+Sans&display=swap" rel="stylesheet">
    <style>
    body {
        margin: 0;
        height: 100vh;
        font-family: 'Inria Sans', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('img/bg-about.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        text-align: center;
    }

    .card {
        background-color: rgba(173, 203, 217, 0.55);
        padding: 2.5rem 3rem;
        border-radius: 16px;
        box-shadow: 0 0 16px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        max-width: 500px;
        width: 708;
        height: 635;
    }

    h1 {
        font-family: 'Fredoka One', cursive;
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    a {
        color: white;
        background-color: #DB9999;
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    a:hover {
        background-color: rgb(173, 103, 148);
    }
    </style>
</head>

<body>
    <div class="card">
        <h1>Pembayaran Berhasil!</h1>
        <p>Terima kasih telah melakukan pembayaran.</p>
        <a href="statuspesanan.php">Lihat Status Pesanan</a>
    </div>
</body>

</html>