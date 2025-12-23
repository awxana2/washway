<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_laundry";
$connect = mysqli_connect($host, $user, $pass, $db);

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Input Pesanan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
    /* ==== CSS ASLI KAMU ==== */
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
        gap: 0.75rem;
        width: 100%;
        padding: 0 1.5rem;
    }

    nav.sidebar-nav a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.875rem;
        color: black;
    }

    nav.sidebar-nav a i {
        font-size: 1.1rem;
    }



    nav.sidebar-nav {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        width: 100%;
        padding: 0 1.5rem;
    }

    nav.sidebar-nav {
        display: flex;
        flex-direction: column;
        border-top: 1 rem;
        gap: 2rem;
        /* sebelumnya 0.75rem */
        width: 100%;
        padding: 1rem;
        margin-left: 2rem;
    }

    aside button {
        margin-top: 2rem;
        /* sebelumnya auto */
        margin-bottom: 1rem;
        background-color: #f9a8d4;
        color: black;
        border: none;
        border-radius: 0.25rem;
        padding: 0.2rem 1.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
    }

    aside button {
        margin-top: auto;
        margin-bottom: 1rem;
        background-color: #f9a8d4;
        color: black;
        border: none;
        border-radius: 0.25rem;
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
        justify-content: center;
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
        font-size: 3.5rem;
        color: #60a5fa;
        text-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
        letter-spacing: 0.1em;
        margin-bottom: 3rem;
        user-select: none;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        max-width: 48rem;
        width: 100%;
        margin: 0 auto;
    }

    form>div {
        display: flex;
        flex-direction: column;
    }

    label {
        display: block;
        font-weight: 600;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: white;
        user-select: none;
    }

    input[type="text"],
    input[type="date"],
    select,
    input[type="number"] {
        width: 100%;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 50px;
        background-color: rgba(251, 207, 232, 0.7);
        color: black;
        font-size: 1.1rem;
        box-sizing: border-box;
    }

    input::placeholder {
        color: rgba(0, 0, 0, 0.5);
    }

    input:focus,
    select:focus {
        outline: 3px solid #f472b6;
    }

    select {
        appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="black" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 1.5rem center;
        background-size: 1.25rem;
    }

    .submit-container {
        display: flex;
        justify-content: flex-end;
    }

    .submit-container button {
        padding: 0.75rem 2rem;
        font-size: 1.1rem;
        border-radius: 0.5rem;
        background-color: #f9a8d4;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-container button:hover {
        background-color: #f472b6;
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
                <p><?= $_SESSION['nama'] ?? 'Pengguna' ?></p>
            </div>
            <hr />
            <nav class="sidebar-nav">
                <a href="pesanan_ui.php"><i class="fas fa-edit"></i> <span>Input Pesanan</span></a>
                <a href="pembayaran.php"><i class="fas fa-money-bill-alt"></i> <span>Pembayaran</span></a>
                <a href="statuspesanan.php"><i class="fas fa-check-circle"></i> <span>Status Pesanan</span></a>
            </nav>
            <button type="button" onclick="window.location.href='logout.php'">LogOut</button>
        </aside>

        <!-- Main Content -->
        <main>
            <h1>Pesan Layanan</h1>
            <form method="POST" action="proses_pesanan.php">
                <div>
                    <label for="nama">nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Nama Anda..." required />
                </div>
                <div>
                    <label for="layanan">Layanan</label>
                    <select name="layanan" id="layanan" required>
                        <option value="Cuci Kering">Cuci Kering</option>
                        <option value="Cuci Setrika">Cuci Setrika</option>
                        <option value="Setrika">Setrika</option>
                        <option value="Setrika">Paket Lengkap</option>

                    </select>
                </div>
                <div>
                    <label for="tanggal_pesan">Tanggal Pesan</label>
                    <input type="date" name="tanggal_pesan" id="tanggal_pesan" required />
                </div>
                <div>
                    <label for="alamat_jemput">Alamat Jemput</label>
                    <input type="text" name="alamat_jemput" id="alamat_jemput" placeholder="Alamat lengkap..."
                        required />
                </div>
                <div>
                    <label for="berat">Berat (Kg)</label>
                    <input type="number" name="berat" id="berat" step="0.1" min="1" required />
                </div>
                <div class="submit-container">
                    <button type="submit">Kirim Pesanan</button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>