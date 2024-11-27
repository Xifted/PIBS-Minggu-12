<?php
include 'koneksi.php';

if (isset($_GET['nim']) && is_string($_GET['nim'])) {
    $nim = strval($_GET['nim']);
    $stmt = $koneksi->prepare("SELECT * FROM data_admin WHERE nim = ?");
    $stmt->bind_param("i", $nim);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Ubah Data</h2>
    <form action="simpanUbah.php" method="POST">
        <input type="hidden" name="nim" value="<?= htmlspecialchars($data['nim']) ?>">
        <label for="nim">NIM: </label>
        <input type="text" id="nim" value="<?= htmlspecialchars($data['nim']) ?> " disabled>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
        <label for="prodi">Kode Prodi: </label>
        <input type="text" name="prodi" id="prodi" value="<?= htmlspecialchars($data['prodi']) ?>" required>
        <button type="submit">Simpan</button>
    </form>
    <button type="btn"><a href="admin.php">Batal</a></button>
</body>

</html>