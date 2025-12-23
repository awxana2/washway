<?php
session_start();
include 'koneksi.php';

$message = [];

// Cek login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$nama_session = $_SESSION['email'];

if (isset($_POST['submit'])) {
    $kode_pesanan = mysqli_real_escape_string($connect, $_POST['kode-pesanan']);
    $tanggal_pesan = mysqli_real_escape_string($connect, $_POST['tanggal-pesan']);

    $bukti = $_FILES['bukti-pembayaran']['name'];
    $bukti_tmp = $_FILES['bukti-pembayaran']['tmp_name'];
    $bukti_folder = 'uploads/' . basename($bukti);

    if (move_uploaded_file($bukti_tmp, $bukti_folder)) {
        $query = mysqli_query($connect, "INSERT INTO pembayaran (nama, kode_pesanan, tanggal_pesan, bukti_pembayaran) 
            VALUES ('$nama_session', '$kode_pesanan', '$tanggal_pesan', '$bukti')");
        if ($query) {
            header("Location: pembayaran_berhasil.php");
            exit();
        } else {
            $message[] = 'Gagal menyimpan data ke database.';
        }
    } else {
        $message[] = 'Gagal mengupload bukti pembayaran.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Pembayaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Inria+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
    body {
        margin: 0;
        font-family: 'Inria Sans', sans-serif;
        background-color: rgb(81, 126, 172);
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
        margin-left: 1.5rem;
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
        min-height: calc(100vh - 50px);
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
        gap: 2rem;
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
        gap: 2rem;

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

    nav.sidebar-nav {
        display: flex;
        flex-direction: column;
        border-top: 1 rem;
        gap: 2rem;
        /* sebelumnya 0.75rem */
        width: 100%;
        padding: 0 1.5rem;
    }




    main {
        flex: 1;
        position: relative;
        padding: 3rem 2rem;
        background: url('https://storage.googleapis.com/a1aa/image/905894c3-73f2-417b-44aa-b9b89c97c606.jpg') center/cover no-repeat;
        background-size: cover;
    }

    main h1 {
        font-family: 'Fredoka One', cursive;
        font-size: 2.5rem;
        color: #60a5fa;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
    }

    form {
        background-color: rgba(173, 203, 217, 0.8);
        padding: 2rem;
        border-radius: 1rem;
        max-width: 600px;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    label {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: none;
        border-radius: 0.5rem;
        background-color: #fde2f3;
        font-size: 1rem;
    }

    input[type="file"] {
        background-color: white;
    }

    .submit-container {
        text-align: right;
    }

    .submit-container button {
        padding: 0.6rem 2rem;
        background-color: #f9a8d4;
        border: none;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
    }

    .submit-container button:hover {
        background-color: #f472b6;
    }

    .message {
        background-color: #e0f7e9;
        padding: 1rem;
        border-left: 5px solid #34d399;
        margin-bottom: 1rem;
        font-weight: bold;
        border-radius: 0.5rem;
        color: #065f46;
    }
    </style>
</head>

<body>
    <header>
        <div><span class="logo-wash">WASH</span><span class="logo-way">WAY</span></div>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="#">Contact</a>
            <a href="logout.php" class="login-btn">Logout</a>
        </nav>
    </header>

    <div class="container">
        <aside>
            <img src="https://storage.googleapis.com/a1aa/image/1f69506b-06f1-45c8-95c7-98e08d20ebf3.jpg" alt="Logo" />
            <hr />
            <div class="user-info">
                <i class="fas fa-user-circle fa-2x text-black"></i>
                <p><?= $_SESSION['nama'] ?? 'Pengguna' ?></p>

                <hr />
                <nav class="sidebar-nav">
                    <a href="pesanan_ui.php"><i class="fas fa-edit"></i> Input Pesanan</a>
                    <a href="pembayaran.php"><i class="fas fa-money-bill-alt"></i> Pembayaran</a>
                    <a href="statuspesanan.php"><i class="fas fa-check-circle"></i> Status Pesanan</a>
                </nav>
        </aside>

        <main>
            <form method="POST" enctype="multipart/form-data">
                <h1>Form Pembayaran</h1>
                <?php foreach ($message as $msg) : ?>
                <div class="message"><?= htmlspecialchars($msg) ?></div>
                <?php endforeach; ?>

                <div>
                    <label>Nama (Email):</label>
                    <input type="text" value="<?= htmlspecialchars($nama_session) ?>" disabled />
                    <input type="hidden" name="nama" value="<?= htmlspecialchars($nama_session) ?>" />
                </div>

                <div>
                    <label for="kode-pesanan">Kode Pesanan:</label>
                    <select id="kode-pesanan" name="kode-pesanan" required>
                        <option value="">-- Pilih Kode Pesanan --</option>
                        <?php
                    $result = mysqli_query($connect, "SELECT id FROM pesanan WHERE nama = '$nama_session'");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = htmlspecialchars($row['id']);
                        echo "<option value=\"$id\">$id</option>";
                    }
                    ?>
                    </select>
                </div>

                <div>
                    <label for="tanggal-pesan">Tanggal Pesan:</label>
                    <input type="date" id="tanggal-pesan" name="tanggal-pesan" required />
                </div>

                <div>
                    <label for="bukti-pembayaran">Bukti Pembayaran:</label>
                    <input type="file" id="bukti-pembayaran" name="bukti-pembayaran" accept="image/png, image/jpeg"
                        required />
                </div>

                <div class="submit-container">
                    <button type="submit" name="submit">Kirim</button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>