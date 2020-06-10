<?php 

include "koneksi.php";

$id = $_GET['id'];
$param = array(':id_tarif' => $id);

$query = $koneksi->prepare("DELETE FROM tarifpulsa WHERE id_tarif = :id_tarif");

if($query->execute($param)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='tarif_tampil.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location='tarif_tampil.php';</script>";
}

?>
