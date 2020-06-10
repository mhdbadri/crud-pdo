<?php 

include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM customer WHERE id_customer = :id_customer";

$stmt = $koneksi->prepare($sql);
$stmt->bindParam(':id_customer',$id);
$stmt->execute();

$result = $stmt->fetch();

if (isset($_POST['simpan']))
{

	$sql2 = "UPDATE customer SET nama_customer = :nama_customer,
								nohp_customer = :nohp_customer
								WHERE id_customer = :id_customer";
	$stmt2 = $koneksi->prepare($sql2);
	$stmt2->bindParam(":nama_customer", $_POST['nama_cus']);
	$stmt2->bindParam(":nohp_customer", $_POST['nohp_cus']);
	$stmt2->bindParam(":id_customer", $id);
	$stmt2->execute();

	header("location:customer_tampil.php");
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
		<h2 align="center">Update Data Customer</h2>
		<div>
		<form action="" method="POST">
		<table>

			<tr>
				<td>Nama Customer</td>
				<td><input type="text" name="nama_cus" value="<?php echo $result['nama_customer']?>"></td>
			</tr>

			<tr>
				<td>No HP Customer</td>
   				<td><input type="text" name="nohp_cus" value="<?php echo $result['nohp_customer']?>"></td>

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
</html>