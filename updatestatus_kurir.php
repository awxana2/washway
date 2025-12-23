<?php
session_start();
include 'koneksi.php';

// Cek apakah login sebagai kurir
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'kurir') {
    header("Location: login.php");
    exit();
}

// Proses update status pengiriman
if (isset($_POST['update_pengiriman'])) {
    $id_pengiriman = mysqli_real_escape_string($connect, $_POST['id_pengiriman']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    $query = "UPDATE pengiriman SET status_pengiriman = '$status' WHERE id = '$id_pengiriman'";
    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Status berhasil diperbarui'); window.location='updatestatus_kurir.php';</script>";
        exit();
    }
}

$email_kurir = $_SESSION['email'];
$data = mysqli_query($connect, "SELECT * FROM pengiriman WHERE nama_kurir = '$email_kurir'");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Status Pengiriman Kurir</title>
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
        height: 60px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        min-height: calc(100vh - 60px);
    }

    aside {
        width: 250px;
        background-color: #2A79B2;
        color: white;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    aside img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 1rem;
    }

    .user-info {
        text-align: center;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .sidebar-nav a {
        color: white;
        text-decoration: none;
        margin: 0.5rem 0;
        display: block;
    }

    main {
        flex-grow: 1;
        padding: 2rem;
        background: url('https://storage.googleapis.com/a1aa/image/905894c3-73f2-417b-44aa-b9b89c97c606.jpg') center/cover no-repeat;
        position: relative;
    }

    main::before {
        content: '';
        position: absolute;
        inset: 0;
        background-color: rgba(255, 255, 255, 0.9);
        z-index: -1;
    }

    h2 {
        text-align: center;
        color: #2563eb;
        margin-bottom: 1.5rem;
    }

    table {
        width: 100%;
        background-color: white;
        border-collapse: collapse;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    th,
    td {
        padding: 1rem;
        border-bottom: 1px solid #ccc;
        text-align: left;
    }

    th {
        background-color: #f9a8d4;
    }

    form {
        display: contents;
    }

    select,
    button {
        padding: 0.5rem;
        font-size: 0.9rem;
        border-radius: 6px;
    }

    button {
        background-color: #2563eb;
        color: white;
        border: none;
        font-weight: 600;
        cursor: pointer;
    }

    button:hover {
        background-color: #1e3a8a;
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
            <img src="https://storage.googleapis.com/a1aa/image/1f69506b-06f1-45c8-95c7-98e08d20ebf3.jpg" alt="User">
            <div class="user-info">
                <p><?= htmlspecialchars($_SESSION['email']) ?></p>
                <p>Kurir</p>
            </div>
            <nav class="sidebar-nav">
                <a href="jemputantar_ui.php"><i class="fas fa-shipping-fast"></i> <span>Jemput Antar</span></a>

                <a href="updatestatus_kurir.php"><i class="fas fa-truck"></i> Update Pengiriman</a>
            </nav>
        </aside>

        <main>
            <h2>Update Status Pengiriman</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pesanan</th>
                        <th>Kurir</th>
                        <th>Status Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <form method="POST">
                            <input type="hidden" name="id_pengiriman" value="<?= $row['id'] ?>">
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['pesanan_id']) ?></td>
                            <td><?= htmlspecialchars($row['nama_kurir']) ?></td>
                            <td>
                                <select name="status" required>
                                    <option value="Dalam Perjalanan"
                                        <?= $row['status_pengiriman'] == 'Dalam Perjalanan' ? 'selected' : '' ?>>Dalam
                                        Perjalanan</option>
                                    <option value="Terkirim"
                                        <?= $row['status_pengiriman'] == 'Terkirim' ? 'selected' : '' ?>>Terkirim
                                    </option>
                                    <option value="Gagal Kirim"
                                        <?= $row['status_pengiriman'] == 'Gagal Kirim' ? 'selected' : '' ?>>Gagal Kirim
                                    </option>
                                </select>
                            </td>
                            <td><button type="submit" name="verifikasi_pengiriman">Update</button></td>
                        </form>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>