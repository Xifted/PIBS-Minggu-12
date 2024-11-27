<?php
$host = 'localhost';
$user = 'root';
$pass = 'root123';
$db   = 'db_admin';

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}
