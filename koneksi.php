<?php
$koneksi = mysqli_connect("localhost", "root", "", "traveling");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
session_start();
?>
