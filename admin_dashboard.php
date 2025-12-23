<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Laundry Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

    body {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        background: url('https://storage.googleapis.com/a1aa/image/905894c3-73f2-417b-44aa-b9b89c97c606.jpg') center/cover no-repeat fixed;
        background-size: cover;
        background-blend-mode: overlay;
        background-color: rgba(67, 55, 28, 0.31);
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
        font-size: 1rem;
        margin-left: 250px;
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
        margin-left: 1rem;
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    .sidebar {
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

    .profile-section {
        text-align: center;
        padding: 0 20px;
        margin-bottom: 20px;
    }

    .sidebar img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .user-info {
        font-size: 0.875rem;
    }

    .user-info p {
        margin: 4px 0;
        color: #ecf0f1;
    }

    .sidebar hr {
        width: 80%;
        border-color: #ffffff33;
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .sidebar a {
        padding: 15px 20px;
        display: block;
        color: white;
        text-decoration: none;
        transition: background-color 0.3s;
        width: 100%;
        box-sizing: border-box;
    }

    .sidebar a:hover {
        background-color: #34495e;
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
        color: #333;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .card {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .card h3 {
        margin: 0;
        font-size: 1.5rem;
    }

    .table-container {
        margin-top: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table-header {
        background-color: #e6b9b3;
        color: #000;
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        text-align: center;
        border: 1px solid #dcdcdc;
        padding: 8px;
    }

    .table th {
        background-color: #e6b9b3;
    }

    .table td {
        background-color: #f9f9f9;
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
            <a class="login-btn" href="login.php">Login</a>
        </nav>
    </header>

    <div class="sidebar">
        <div class="profile-section">
            <img src="https://storage.googleapis.com/a1aa/image/1f69506b-06f1-45c8-95c7-98e08d20ebf3.jpg" alt="Logo" />
            <div class="user-info">
                <i class="fas fa-user-circle fa-2x"></i>
                <p class="username">Admin Laundry</p>
                <p class="email">admin@example.com</p>
            </div>
            <hr />
        </div>

        <h2>Admin Panel</h2>
        <a href="manajemen_pesanan.php"><i class="fas fa-tasks"></i> Manajemen Pesanan</a>
        <a href="input_kurir.php"><i class="fas fa-truck"></i> Input Kurir</a>
        <a href="verifikasi_pembayaran.php"><i class="fas fa-money-check-alt"></i> Pembayaran</a>
        <a href="laporan.php"><i class="fas fa-file-alt"></i> Laporan</a>
        <a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="logout.php" style="margin-top: 2rem;"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <h1>Dashboard Admin Laundry</h1>
        <div>Selamat Datang, Admin</div>

        <div class="card-container">
            <div class="card">
                <h3>25</h3>
                <p>Pesanan Hari Ini</p>
            </div>
            <div class="card">
                <h3>10</h3>
                <p>Kurir Terkirim</p>
            </div>
            <div class="card">
                <h3>Rp. 1.200.000</h3>
                <p>Pendapatan Hari Ini</p>
            </div>
            <div class="card">
                <h3>52</h3>
                <p>Total Transaksi</p>
            </div>
        </div>
    </div>
</body>

</html>