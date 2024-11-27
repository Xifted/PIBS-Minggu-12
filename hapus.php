<?php
include 'koneksi.php';

if (isset($_GET['nim']) && is_string($_GET['nim'])) {
    $nim = strval($_GET['nim']);
    $stmt = $koneksi->prepare("DELETE FROM data_admin WHERE nim = ?");
    $stmt->bind_param("s", $nim);

    if ($stmt->execute()) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $koneksi->error;
    }

    $stmt->close();
}
?>