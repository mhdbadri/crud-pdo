<?php 

include "koneksi.php";

$id = $_GET['id'];
$param = array(':id_provider' => $id);

$query = $koneksi->prepare("DELETE FROM provider WHERE id_provider = :id_provider");

if($query->execute($param)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='provider_tampil.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location='provider_tampil.php';</script>";
}

?>