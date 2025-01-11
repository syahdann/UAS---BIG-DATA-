<?php
// Koneksi ke database
require_once("koneksi.php");    
$conn = new mysqli("localhost", "root", "", "pln1");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pengaduan dari database
$sql = "SELECT * FROM pengaduan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Halaman Pengaduan Konsumen</h1></h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Masalah</th>
                    <th>Detail Masalah</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php $no = 1; while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['namapelapor']); ?></td>
                            <td><?= htmlspecialchars($row['masalah']); ?></td>
                            <td><?= htmlspecialchars($row['isi']); ?></td>
                            <td><?= htmlspecialchars($row['alamat']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pengaduan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
