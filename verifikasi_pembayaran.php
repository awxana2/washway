<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM pembayaran ORDER BY created_at DESC";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Verifikasi Pembayaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
    body {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        background-color: #f0f4f8;
    }

    header {
        background-color: #D9D9D9;
        padding: 0.5rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-size: 0.9rem;
    }

    .logo-wash {
        color: #2A79B2;
        font-weight: 700;
    }

    .logo-way {
        color: #74B3E0;
        font-weight: 700;
    }

    nav a {
        text-decoration: none;
        color: black;
        font-weight: 600;
        margin-left: 0.5rem;
    }

    nav a:hover {
        text-decoration: underline;
    }

    .login-btn {
        background-color: #6ea4d9;
        color: white;
        padding: 0.15rem 0.5rem;
        border-radius: 6px;
        font-weight: 600;
    }

    .container {
        display: flex;
    }

    aside {
        width: 250px;
        background-color: #2A79B2;
        height: 100vh;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
    }

    aside img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .user-info {
        font-size: 0.875rem;
        text-align: center;
    }

    .user-info p {
        margin: 4px 0;
        color: #ecf0f1;
    }

    hr {
        border: none;
        border-top: 1px solid black;
        width: 75%;
    }

    nav.sidebar-nav {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        width: 100%;
        padding: 0 1.5rem;
    }

    nav.sidebar-nav a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.875rem;
        color: white;
        margin-bottom: 1rem;
    }

    main {
        flex: 1;
        padding: 3rem 2rem;
        background: url('https://storage.googleapis.com/a1aa/image/905894c3-73f2-417b-44aa-b9b89c97c606.jpg') center/cover no-repeat;
        background-size: cover;
        position: relative;
    }

    main::before {
        content: "";
        position: absolute;
        inset: 0;
        background-color: rgba(255, 255, 255, 0.6);
        z-index: 0;
    }

    main h1 {
        position: relative;
        z-index: 1;
        font-size: 2.5rem;
        color: #2A79B2;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 0 0 4px rgba(0, 0, 0, 0.3);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: rgba(255, 255, 255, 0.9);
        position: relative;
        z-index: 1;
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border: 1px solid #ccc;
    }

    th {
        background-color: #f9a8d4;
        color: black;
    }

    tr:hover {
        background-color: #fde7f3;
    }

    img.bukti {
        width: 100px;
        height: auto;
        border-radius: 8px;
    }
    </style>
</head>

<body>

    <header>
        <div class="logo-text">
            <span class="logo-wash">WASH</span><span class="logo-way">WAY</span>
        </div>
        <nav>
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="logout.php" class="login-btn">Logout</a>
        </nav>
    </header>

    <div class="container">
        <aside>
            <img src="https://storage.googleapis.com/a1aa/image/1f69506b-06f1-45c8-95c7-98e08d20ebf3.jpg" alt="Admin" />
            <div class="user-info">
                <p><?= htmlspecialchars($_SESSION['email']) ?></p>
                <p>Admin</p>
            </div>
            <hr />
            <nav class="sidebar-nav">
                <a href="manajemen_pesanan.php"><i class="fas fa-tasks"></i> Status Pesanan</a>
                <a href="input_kurir.php"><i class="fas fa-truck"></i> Input Kurir</a>
                <a href="verifikasi_pembayaran.php"><i class="fas fa-money-check-alt"></i> Verifikasi Pembayaran</a>
                <a href="laporan.php"><i class="fas fa-file-alt"></i> Laporan Bulanan</a>
            </nav>
        </aside>

        <main>
            <h1>Verifikasi Pembayaran</h1>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Bayar</th>
                        <th>Bukti Bayar</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal_pesan']) ?></td>
                        <td>
                            <a href="uploads/<?= htmlspecialchars($row['bukti_pembayaran']) ?>" target="_blank">
                                <img src="uploads/<?= htmlspecialchars($row['bukti_pembayaran']) ?>" class="bukti"
                                    alt="Bukti Pembayaran">
                            </a>
                        </td>
                        <td><span style="color: green;">Terverifikasi</span></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>

</body>

</html>