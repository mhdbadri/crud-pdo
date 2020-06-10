<?php 
include "koneksi.php";
if (isset($_POST['simpan']))
{
	$nama = $_POST['nama_cus'];
	$nohp = $_POST['nohp_cus'];

	$sql = "INSERT INTO customer VALUES ('',:nama_customer, :nohp_customer)";

	$stmt = $koneksi->prepare($sql);
	$stmt->bindParam(":nama_customer", $nama);
	$stmt->bindParam(":nohp_customer", $nohp);
	$stmt->execute();
header("location:customer_tampil.php");
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
	<h2>Tambah Data Customer</h2>
	<center>
	<table>
		<tr>
			<td>Nama Customer</td>
			<td>
				<input type="text" name="nama_cus" placeholder="Masukkan Nama Customer">
			</td>
		</tr>

		<tr>
			<td>No HP Customer</td>
			<td>
				<input type="text" name="nohp_cus" placeholder="Masukkan No HP Customer">
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
