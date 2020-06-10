<?php 

include "koneksi.php";

$id = $_GET['id'];
$param = array(':id_order' => $id);

$query = $koneksi->prepare("DELETE FROM orderan WHERE id_order = :id_order");

if($query->execute($param)) {
    echo "<script>alert('Data berhasil dihapus');
    window.location='orderan_tampil.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');
    window.location='orderan_tampil.php';</script>";
}

?>