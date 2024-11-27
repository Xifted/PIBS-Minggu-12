<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim  = htmlspecialchars(trim($_POST['nim']));
    $nama = htmlspecialchars(trim($_POST['nama']));
    $prodi = htmlspecialchars(trim($_POST['prodi']));

    $stmt = $koneksi->prepare("INSERT INTO data_admin (nim, nama, prodi) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nim, $nama, $prodi);

    if ($stmt->execute()) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $koneksi->error;
    }

    $stmt->close();
}
?>