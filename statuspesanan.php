<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['email']) || !isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_laundry";
$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$nama = $_SESSION['nama'];
$email = $_SESSION['email'];

// Ambil hanya pesanan milik user yang login
$query = "SELECT * FROM pesanan WHERE nama = '$nama'";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Status Pesanan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

    body {
        margin: 0;
        min-height: 100vh;
        font-family: 'Montserrat', sans-serif;
        font-size: 1.1rem;
        background-color: #f0f4f8;
    }

    .container {
        display: flex;
        min-height: calc(100vh - 70px);
    }

    header {
        background-color: #D9D9D9;
        padding: 0.5rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        user-select: none;
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
        font-size: 0.9rem;
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
        font-size: 0.9rem;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Pusatkan secara horizontal */
        gap: 0.25rem;
    }

    aside {
        background-color: #cbd5e1;
        width: 14rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 0;
        gap: 1.5rem;
    }

    aside img {
        width: 64px;
        height: 64px;
        margin-bottom: 0.25rem;
        border-radius: 50%;
        object-fit: cover;
    }

    aside p {
        margin: 0;
        font-size: 0.875rem;
        color: black;
    }

    hr {
        border: none;
        border-top: 1px solid black;
        width: 75%;
    }

    nav.sidebar-nav {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 1.25rem;
        width: 100%;
        padding: 0 1.5rem;
        margin-top: 1rem;
        margin-left: 2rem;
    }

    nav.sidebar-nav a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.875rem;
        color: black;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    nav.sidebar-nav a:hover {
        color: #2563eb;
    }

    aside button {
        margin-top: auto;
        margin-bottom: 1rem;
        background-color: #f9a8d4;
        color: black;
        border: none;
        border-radius: 0.250rem;
        padding: 0.2rem 1.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    aside button:hover {
        background-color: #f472b6;
    }

    main {
        flex: 1;
        position: relative;
        padding: 3rem 2rem;
        display: flex;
        flex-direction: column;
        background-color: transparent;
    }

    main::before {
        content: "";
        position: absolute;
        inset: 0;
        background: url('https://storage.googleapis.com/a1aa/image/905894c3-73f2-417b-44aa-b9b89c97c606.jpg') center/cover no-repeat;
        opacity: 0.7;
        z-index: -1;
    }

    h1 {
        font-size: 3rem;
        color: #60a5fa;
        text-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
        text-align: center;
        user-select: none;
    }

    table {
        margin-top: 2rem;
        width: 100%;
        border-collapse: collapse;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        overflow: hidden;
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #f9a8d4;
        color: black;
    }

    tr:hover {
        background-color: #fde7f3;
    }
    </style>
</head>

<body>
    <header>
        <div class="text-2xl font-bold logo-text select-none">
            <span class="logo-wash">WASH</span><span class="logo-way">WAY</span>
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="#">Contact</a>
            <a class="login-btn" href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <aside>
            <img src="https://storage.googleapis.com/a1aa/image/1f69506b-06f1-45c8-95c7-98e08d20ebf3.jpg" alt="Logo" />
            <hr />
            <div class="user-info">
                <i class="fas fa-user-circle fa-2x text-black"></i>
                <p><?= htmlspecialchars($email) ?></p>
            </div>
            <hr />
            <nav class="sidebar-nav">
                <a href="pesanan_ui.php"><i class="fas fa-edit"></i> <span>Input Pesanan</span></a>
                <a href="pembayaran.php"><i class="fas fa-money-bill-alt"></i> <span>Pembayaran</span></a>
                <a href="statuspesanan.php"><i class="fas fa-check-circle"></i> <span>Status Pesanan</span></a>
            </nav>
        </aside>

        <!-- Main -->
        <main>
            <h1>Status Pesanan</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Layanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Alamat Jemput</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['layanan']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal_pesan']) ?></td>
                        <td><?= htmlspecialchars($row['alamat_jemput']) ?></td>
                        <?php
$status = $row['status'];
$warna = 'gray';
if ($status == 'Diproses') $warna = 'orange';
else if ($status == 'Dikirim') $warna = 'blue';
else if ($status == 'Selesai') $warna = 'green';
?>
                        <td><strong style="color: <?= $warna ?>;"><?= htmlspecialchars($status) ?></strong></td>
                        <td>Rp. <?= number_format($row['berat'] * 4000, 0, ',', '.') ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>