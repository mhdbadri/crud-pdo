<?php 

include "koneksi.php";

$id = $_GET['id'];
$param = array(':id_customer' => $id);

$query = $koneksi->prepare("DELETE FROM customer WHERE id_customer = :id_customer");

if($query->execute($param)) {
    echo "<script>alert('Data berhasil dihapus'); 
    window.location='customer_tampil.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); 
    window.location='customer_tampil.php';</script>";
}

?>
