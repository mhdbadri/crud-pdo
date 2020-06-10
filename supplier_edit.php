<?php 

include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM supplier WHERE id_supplier = :id_supplier";

$stmt = $koneksi->prepare($sql);
$stmt->bindParam(':id_supplier',$id);
$stmt->execute();

$result = $stmt->fetch();

if (isset($_POST['simpan']))
{

	$sql2 = "UPDATE supplier SET nama_supplier = :nama_supplier,
								nohp_supplier = :nohp_supplier
								WHERE id_supplier = :id_supplier";
	$stmt2 = $koneksi->prepare($sql2);
	$stmt2->bindParam(":nama_supplier", $_POST['namasup']);
	$stmt2->bindParam(":nohp_supplier", $_POST['nohpsup']);
	$stmt2->bindParam(":id_supplier", $id);
	$stmt2->execute();

	header("location:supplier_tampil.php");
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
		<h2 align="center">Update Data Supplier</h2>
		<br>

		<form action="" method="POST">
		<table>

			<tr>
				<td>Nama Supplier</td>
				<td><input type="text" name="namasup" value="<?php echo $result['nama_supplier']?>"></td>
			</tr>

			<tr>
				<td>No HP Supplier</td>
   				<td><input type="text" name="nohpsup" value="<?php echo $result['nohp_supplier']?>"></td>

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