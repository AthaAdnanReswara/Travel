<?php
include 'koneksi.php';

$id = $_GET['id'];
// hapus data destinasi
$query = mysqli_query($koneksi, "DELETE FROM destinasi WHERE id=$id");
?>

<script>
    alert("Destinasi berhasil dihapus!");
    location.href="?page=destinasi";
</script>
