<?php
include 'koneksi.php';

$query = "SELECT * FROM data_admin ORDER BY date_added DESC";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasi Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Form Tambah Data</h2>
    <form action="tambah.php" method="POST">
        <label for="nim">NIM: </label>
        <input type="text" name="nim" id="nim" required>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama" required>
        <label for="prodi">Kode Prodi: </label>
        <input type="text" name="prodi" id="prodi" required>
        <button type="submit">Simpan</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $nomor = 1;
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= htmlspecialchars($row['nim']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['prodi']) ?></td>
                <td>
                    <a href="ubah.php?nim=<?= htmlspecialchars($row['nim']) ?>">Ubah</a> |
                    <a href="hapus.php?nim=<?= htmlspecialchars($row['nim']) ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php
            $nomor++;
        endwhile;
        ?>
    </table>
</body>

</html>