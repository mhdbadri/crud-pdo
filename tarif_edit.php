<?php 

include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM tarifpulsa WHERE id_tarif = :id_tarif";

$stmt = $koneksi->prepare($sql);
$stmt->bindParam(':id_tarif',$id);
$stmt->execute();

$result = $stmt->fetch();

if (isset($_POST['simpan']))
{

	$sql2 = "UPDATE tarifpulsa SET pil_tarif = :pil_tarif,
								harga_modal = :harga_modal,
								harga_jual = :harga_jual
								WHERE id_tarif = :id_tarif";
	$stmt2 = $koneksi->prepare($sql2);
	$stmt2->bindParam(":pil_tarif", $_POST['tarif']);
	$stmt2->bindParam(":harga_modal", $_POST['hargamod']);
	$stmt2->bindParam(":harga_jual", $_POST['hargajual']);
	$stmt2->bindParam(":id_tarif", $id);
	$stmt2->execute();

	header("location:tarif_tampil.php");
}



?>


<html>
<link rel="stylesheet"href="assets/css/style.css">
<head>
	<title>HASBI PONSEL</title>
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
		<h2 align="center">Update Data Tarif Pulsa</h2>
		<br>

		<form action="" method="POST">
		<table>

			<tr>
				<td>Pilihan Tarif Pulsa</td>
				<td><input type="text" name="tarif" value="<?php echo $result['pil_tarif']?>"></td>
			</tr>

			<tr>
				<td>Harga Modal</td>
   				<td><input type="text" name="hargamod" value="<?php echo $result['harga_modal']?>"></td>

			</tr>

			<tr>
				<td>Harga Jual</td>
   				<td><input type="text" name="hargajual" value="<?php echo $result['harga_jual']?>"></td>

			</tr>


		<tr>
			
			<td>
				
			</td>
			<td>
				
				<input type="submit" name="simpan" value="Simpan">
				<input type="reset" name="" value="Reset">
			</td>

		</tr>


		 </table>
		</form>



		</div>
			
		</div>

		<div>
			<?php include "footer.php"; ?>
		</div>

</body>
		
</body>
</html>