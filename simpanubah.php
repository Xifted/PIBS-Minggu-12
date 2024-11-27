<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = strval($_POST['nim']);
    $nama = htmlspecialchars(trim($_POST['nama']));
    $prodi = htmlspecialchars(trim($_POST['prodi']));

    $stmt = $koneksi->prepare("UPDATE data_admin SET nama = ?, prodi = ? WHERE nim = ?");
    $stmt->bind_param("sss", $nama, $prodi, $nim);

    if ($stmt->execute()) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $koneksi->error;
    }

    $stmt->close();
}
?>