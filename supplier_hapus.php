<?php 

include "koneksi.php";

$id = $_GET['id'];
$param = array(':id_supplier' => $id);

$query = $koneksi->prepare("DELETE FROM supplier WHERE id_supplier = :id_supplier");

if($query->execute($param)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='supplier_tampil.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location='supplier_tampil.php';</script>";
}

?>
