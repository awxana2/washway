<?php
session_start();

// ✅ Validasi login
if (!isset($_SESSION['email']) || !isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit();
}

// ✅ Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_laundry";

$connect = mysqli_connect($host, $user, $pass, $db);
if (!$connect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// ✅ Proses saat form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $email = $_SESSION['email'];
    $nama = $_SESSION['nama'];
    $layanan = $_POST['layanan'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $alamat_jemput = $_POST['alamat_jemput'];
    $berat = $_POST['berat'];
    $kurir = ''; // default kosong (belum diproses pengiriman)

    // ✅ Masukkan ke tabel `pesanan`
    $query = "INSERT INTO pesanan (nama, layanan, tanggal_pesan, alamat_jemput, berat, kurir, status)
          VALUES (?, ?, ?, ?, ?, ?, 'Diproses')";

   $stmt = mysqli_prepare($connect, $query);


    if ($stmt) {
mysqli_stmt_bind_param($stmt, "ssssis", $nama, $layanan, $tanggal_pesan, $alamat_jemput, $berat, $kurir);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Pesanan berhasil dikirim!'); window.location.href='statuspesanan.php';</script>";
            exit();
        } else {
            echo "<script>alert('Gagal menyimpan pesanan: " . mysqli_error($connect) . "');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Query gagal disiapkan: " . mysqli_error($connect) . "');</script>";
    }
}

mysqli_close($connect);
?>