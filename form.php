<?php
include 'database.php';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id_siswa = $_POST['id_siswa'];
    $nama = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $id_pegawai = $_POST['id_pegawai'];

    // Query untuk memasukkan data ke tabel siswa
    $query = "INSERT INTO siswa (id_siswa, nama_siswa, jenis_kelamin, email, id_pegawai) 
              VALUES ('$id_siswa', '$nama', '$jenis_kelamin', '$email', '$id_pegawai')";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect ke halaman daftar.php
        header("Location: daftar.php");
        exit(); // Pastikan script dihentikan setelah redirect
    } else {
        // Jika terjadi error saat query
        echo "Error: " . mysqli_error($koneksi);
    }
}

$query_pegawai = "SELECT * FROM pegawai";
$result_pegawai = mysqli_query($koneksi, $query_pegawai);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff0f5;
            font-family: 'Poppins';
        }
        .card {
            box-shadow: 0 10px 25px rgba(167,9,122,0.2);
            border-radius: 15px;
        }
        .card-header {
            background: linear-gradient(to right, #a7097a, #8a0662) !important;
            color: white !important;
        }
        .btn-primary {
            background-color: #a7097a !important;
            border-color: #a7097a !important;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #8a0662 !important;
            transform: translateY(-3px);
        }
        .form-label {
            color: #a7097a;
            font-weight: bold;
        }
        .form-control:focus,
        .form-select:focus {
            border-color: #a7097a;
            box-shadow: 0 0 0 0.25rem rgba(167,9,122,0.25);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Formulir Pendaftaran Siswa</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">ID Siswa</label>
                        <input type="text" class="form-control" name="id_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pegawai yang Menangani</label>
                        <select class="form-select" name="id_pegawai" required>
                            <?php while ($pegawai = mysqli_fetch_assoc($result_pegawai)) { ?>
                                <option value="<?= $pegawai['id_pegawai'] ?>">
                                    <?= $pegawai['nama'] ?> - <?= $pegawai['jabatan'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Tombol submit untuk mengirimkan form -->
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="bi bi-person-plus"></i> Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
