<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Ambil bulan
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('Y-m');

// Query data berdasarkan bulan
$query = "SELECT * FROM pesanan WHERE DATE_FORMAT(tanggal_pesan, '%Y-%m') = '$bulan'";
$result = mysqli_query($connect, $query);

// Hitung total
$total_pesanan = mysqli_num_rows($result);
$total_berat = 0;
$total_pemasukan = 0;

while ($r = mysqli_fetch_assoc($result)) {
    $total_berat += $r['berat'];
    $total_pemasukan += $r['berat'] * 4000;
}
mysqli_data_seek($result, 0); // reset pointer
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Bulanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />
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

    .container {
        display: flex;
    }

    aside {
        width: 250px;
        background-color: #2A79B2;
        color: white;
        height: 100vh;
        padding-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    aside img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    nav.sidebar-nav a {
        color: white;
        display: block;
        padding: 0.5rem 1rem;
    }

    main {
        flex: 1;
        padding: 2rem;
        background: url('https://storage.googleapis.com/a1aa/image/905894c3-73f2-417b-44aa-b9b89c97c606.jpg') center/cover no-repeat;
        background-size: cover;
        min-height: 100vh;
    }

    h1 {
        font-size: 2rem;
        color: #2563eb;
        margin-bottom: 1rem;
    }

    .filter {
        margin-bottom: 1rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }

    th,
    td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #f9a8d4;
    }

    .summary {
        margin: 2rem 0;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 1rem;
        border-radius: 8px;
    }

    .summary p {
        margin: 0.3rem 0;
    }
    </style>
</head>

<body>
    <header>
        <div><span class="logo-wash">WASH</span><span class="logo-way">WAY</span></div>
        <nav><a href="logout.php">Logout</a></nav>
    </header>

    <div class="container">
        <aside>
            <img src="https://storage.googleapis.com/a1aa/image/1f69506b-06f1-45c8-95c7-98e08d20ebf3.jpg" alt="Admin">
            <p><?= htmlspecialchars($_SESSION['email']) ?></p>
            <nav class="sidebar-nav">
                <a href="manajemen_pesanan.php">Status Pesanan</a>
                <a href="input_kurir.php">Input Kurir</a>
                <a href="verifikasi_pembayaran.php">Verifikasi Pembayaran</a>
                <a href="laporan.php">Laporan Bulanan</a>
            </nav>
        </aside>

        <main>
            <h1>Laporan Bulanan</h1>

            <form class="filter" method="GET">
                <label for="bulan">Pilih Bulan:</label>
                <input type="month" name="bulan" id="bulan" value="<?= $bulan ?>">
                <button type="submit">Tampilkan</button>
            </form>

            <div class="summary">
                <p><strong>Total Pesanan:</strong> <?= $total_pesanan ?></p>
                <p><strong>Total Berat:</strong> <?= $total_berat ?> Kg</p>
                <p><strong>Total Pemasukan:</strong> Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Layanan</th>
                        <th>Berat (Kg)</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= $row['tanggal_pesan'] ?></td>
                        <td><?= $row['layanan'] ?></td>
                        <td><?= $row['berat'] ?></td>
                        <td>Rp <?= number_format($row['berat'] * 4000, 0, ',', '.') ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>