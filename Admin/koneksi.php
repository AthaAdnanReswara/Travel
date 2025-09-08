<?php
$koneksi = mysqli_connect("localhost", "root", "", "travel");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
