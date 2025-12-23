<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Proses ubah status
if (isset($_POST['update_status'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $update = mysqli_query($connect, "UPDATE pesanan SET status = '$status' WHERE id = '$id'");
    if ($update) {
        echo "<script>alert('Status berhasil diperbarui'); window.location='manajemen_pesanan.php';</script>";
        exit();
    }
}

$result = mysqli_query($connect, "SELECT * FROM pesanan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Manajemen Pesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
    body {
        margin: 0;
        min-height: 100vh;
        font-family: 'Montserrat', sans-serif;
        font-size: 1.1rem;
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
    }

    .container {
        display: flex;
        min-height: calc(100vh - 70px);
    }

    aside {
        width: 250px;
        background-color: #2A79B2;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
    }

    aside img {
        width: 50px;
        height: 50px;
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
        margin-left: 1rem;
    }

    nav.sidebar-nav a i {
        font-size: 1.1rem;
        margin-left: 1rem;
    }

    main {
        flex: 1;
        position: relative;
        padding: 3rem 2rem;
        display: flex;
        flex-direction: column;
        background-color: transparent;
        margin-left: 250px;
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

    select {
        padding: 6px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    button.simpan-btn {
        background-color: #60a5fa;
        color: white;
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    button.simpan-btn:hover {
        background-color: #2563eb;
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
                <a href="manajemen_pesanan.php"><i class="fas fa-list"></i> Manajemen Pesanan</a>
                <a href="input_kurir.php"><i class="fas fa-truck"></i> Input Kurir</a>
                <a href="verifikasi_pembayaran.php"><i class="fas fa-money-check-alt"></i> Verifikasi Pembayaran</a>
                <a href="laporan.php"><i class="fas fa-file-alt"></i> Laporan</a>
            </nav>
        </aside>

        <main>
            <h1>Manajemen Pesanan</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['layanan']) ?></td>
                            <td><?= htmlspecialchars($row['tanggal_pesan']) ?></td>
                            <td><?= htmlspecialchars($row['alamat_jemput']) ?></td>
                            <td>
                                <select name="status">
                                    <option value="Diproses" <?= $row['status'] == 'Diproses' ? 'selected' : '' ?>>
                                        Diproses</option>
                                    <option value="Dikirim" <?= $row['status'] == 'Dikirim' ? 'selected' : '' ?>>
                                        Dikirim
                                    </option>
                                    <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>
                                        Selesai
                                    </option>
                                </select>
                            </td>
                            <td>Rp. <?= number_format($row['berat'] * 4000, 0, ',', '.') ?></td>
                            <td><button type="submit" name="update_status" class="simpan-btn">Simpan</button>
                            </td>
                        </form>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>