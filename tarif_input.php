<?php 
include "koneksi.php";
if (isset($_POST['simpan']))
{
	$piltarif = $_POST['tarif'];
	$hmodal   = $_POST['hargamod'];
	$hjual   = $_POST['hargajual'];

	$sql = "INSERT INTO tarifpulsa VALUES ('',:pil_tarif, :harga_modal, :harga_jual)";

	$stmt = $koneksi->prepare($sql);
	$stmt->bindParam(":pil_tarif", $piltarif);
	$stmt->bindParam(":harga_modal", $hmodal);
	$stmt->bindParam(":harga_jual", $hjual);
	$stmt->execute();
header("location:tarif_tampil.php");
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
	<h2 align="center">Tambah Data Tarif Pulsa</h2>
	<center>
	<table>
		<tr>
			<td>Pilihan Tarif</td>
			<td>
				<input type="text" name="tarif" placeholder="Masukkan Pilihan Tarif">
			</td>
		</tr>

		<tr>
			<td>Harga Modal</td>
			<td>
				<input type="text" name="hargamod" placeholder="Masukkan Harga Modal">
			</td>
		</tr>

		<tr>
			<td>Harga Jual</td>
			<td>
				<input type="text" name="hargajual" placeholder="Masukkan Harga Jual">
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
