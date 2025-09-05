<?php
session_start();
//koneksi

$con = mysqli_connect("localhost", "root", "", "travel");

if (!$con) {
    die("Koneksi Gagal: ". mysqli_connect_error());
}

function login()
{
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
    global $con;

    $data = mysqli_query($con, "SELECT * FROM users WHERE nama='$nama' AND password='$password'");
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($data);
        echo '<script>alert("Selamat datang, login berhasil");location.
                                                href="index.php"</script>';
    } else {
        echo '<script>alert("Maaf, Username/Password salah");</script>';
    }

}
