<?php
include 'database.php';

$query = "SELECT siswa.*, pegawai.nama as nama_pegawai, pegawai.jabatan 
          FROM siswa 
          JOIN pegawai ON siswa.id_pegawai = pegawai.id_pegawai";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff0f5;
            font-family: 'Poppins';
        }
        .card-header {
            background-color: #a7097a !important;
        }
        .table-dark th {
            background-color: #df6cbe !important;
            color: white;
        }
        .btn {
            background-color: #8a0662 !important;
            color: white !important;
        }
        .btn:hover {
            color: black !important;
        }
        .btn-warning {
            background-color: #a7097a !important;
            color: white !important;
        }
        .btn-danger {
            background-color: red !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Daftar Pendaftar</h2>
                <a href="form.php" class="btn">
                    <i class="bi bi-person-plus"></i> Tambah Siswa Baru
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Pegawai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($siswa = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $siswa['nama_siswa'] ?></td>
                                <td><?= $siswa['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                <td><?= $siswa['email'] ?></td>
                                <td><?= $siswa['nama_pegawai'] ?> (<?= $siswa['jabatan'] ?>)</td>
                              
                                <td>    
                                    <div class="btn-group" role="group">
                                        <a href="edit.php?id=<?= $siswa['id_siswa'] ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="delete2.php?id=<?= $siswa['id_siswa'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>