<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_laundry";
$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses penyimpanan kurir
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pesanan_id'], $_POST['kurir'])) {
    $pesanan_id = intval($_POST['pesanan_id']);
    $kurir = mysqli_real_escape_string($connect, $_POST['kurir']);

    $insert = "INSERT INTO pengiriman (pesanan_id, nama_kurir) VALUES ('$pesanan_id', '$kurir')";
    if (mysqli_query($connect, $insert)) {
        echo "<script>alert('Kurir berhasil diinput'); window.location.href='input_kurir.php';</script>";
        exit;
    } else {
        echo "Gagal menyimpan data kurir: " . mysqli_error($connect);
        exit;
    }
}

// Ambil data pesanan
$query = "SELECT * FROM pesanan ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Input Kurir</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />
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
        width: 64px;
        height: 64px;
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

    nav.sidebar-nav a i {
        font-size: 1.1rem;
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

    h2 {
        font-size: 2.5rem;
        color: #60a5fa;
        text-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
        text-align: center;
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

    select,
    input[type=submit] {
        padding: 5px;
        font-size: 1rem;
    }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo-text">
            <span class="logo-wash">WASH</span><span class="logo-way">WAY</span>
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="#">Contact</a>
            <a class="login-btn" href="login.php">Login</a>
        </nav>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <aside>
            <img src="https://storage.googleapis.com/a1aa/image/1f69506b-06f1-45c8-95c7-98e08d20ebf3.jpg" alt="Admin" />
            <div class="user-info">
                <p>Admin</p>
                <p>admin@example.com</p>
            </div>
            <hr />
            <nav class="sidebar-nav">
                <a href="manajemen_pesanan.php"><i class="fas fa-tasks"></i> Manajemen Pesanan</a>
                <a href="input_kurir.php"><i class="fas fa-truck"></i> Input Kurir</a>
                <a href="verifikasi_pembayaran.php"><i class="fas fa-money-check-alt"></i> Pembayaran</a>
                <a href="laporan.php"><i class="fas fa-file-alt"></i> Laporan</a>
                <a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="logout.php" style="margin-top: 2rem;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </aside>

        <main>
            <h2>Input Kurir untuk Pesanan</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pesanan</th>
                        <th>Nama (Email)</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Kurir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    $result_kurir = mysqli_query($connect, "SELECT email FROM user WHERE role = 'kurir'");

                    $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <form method="POST">
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['layanan']) ?></td>
                            <td><?= htmlspecialchars($row['tanggal_pesan']) ?></td>
                            <td>
                                <input type="hidden" name="pesanan_id" value="<?= $row['id'] ?>">
                                <select name="kurir" required>
                                    <option value="">Pilih Kurir</option>
                                    <?php
        mysqli_data_seek($result_kurir, 0); // restart result pointer
        while ($k = mysqli_fetch_assoc($result_kurir)) :
        ?>
                                    <option value="<?= htmlspecialchars($k['email']) ?>">
                                        <?= htmlspecialchars($k['email']) ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                            <td><input type="submit" value="Input Kurir"></td>
                        </form>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>