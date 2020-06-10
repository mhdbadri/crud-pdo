<?php 
include "koneksi.php";
if (isset($_POST['simpan']))
{
	$namasup = $_POST['nama'];
	$nosup   = $_POST['nohp'];

	$sql = "INSERT INTO supplier VALUES ('',:nama_supplier, :nohp_supplier)";

	$stmt = $koneksi->prepare($sql);
	$stmt->bindParam(":nama_supplier", $namasup);
	$stmt->bindParam(":nohp_supplier", $nosup);
	$stmt->execute();
header("location:supplier_tampil.php");
}
?>


<html>

	<head>
	<title>HASBI PONSEL</title>
	<link rel="stylesheet"href="assets/css/style.css">
	</head>

<body>
	<div class="utama">
	<!--header-->
		<div>
			<?php include "header.php"; ?>
		</div>

		<!--menu-->
		<div>
			<?php include "menu.php"; ?>
		</div>
	
	<div class="isi">
	
	<form action="" method="POST">
	<center>	
	<h2>Tambah Data Supplier</h2>
	<center>
	<table>
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input type="text" name="nama" placeholder="Masukkan Nama Supplier">
			</td>
		</tr>

		<tr>
			<td>No HP Supplier</td>
			<td>
				<input type="text" name="nohp" placeholder="Masukkan No HP Supplier">
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" name="simpan">
				<input type="reset" name="reset">
			</td>
		</tr>
	</table>
	</center>
</form>
	</div>

</div>
</center>

		<div>
			<?php include "footer.php"; ?>
		</div>

</body>
