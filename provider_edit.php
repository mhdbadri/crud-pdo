<?php 
include "koneksi.php";
$id = $_GET['id'];
$sql = "SELECT * FROM provider WHERE id_provider = :id_provider";

$stmt = $koneksi->prepare($sql);
$stmt->bindParam(":id_provider", $id);
$stmt->execute();

$result = $stmt->fetch();

if (isset($_POST['edit'])) 
{
	$sql2 = "UPDATE provider SET nama_provider = :nama_provider,
				id_supplier = :id_supplier,
				id_tarif = :id_tarif,
				harga_jual = :harga_jual
				WHERE id_provider = :id_provider";

	$stmt2 = $koneksi->prepare($sql2);
	$stmt2->bindParam(":nama_provider", $_POST['npro']);
	$stmt2->bindParam(":id_supplier", $_POST['idsup']);
	$stmt2->bindParam(":id_tarif", $_POST['idtarif']);
	$stmt2->bindParam(":harga_jual", $_POST['hjual']);
	$stmt2->bindParam(":id_provider", $id);
	$stmt2->execute();

	header("location:provider_tampil.php");
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
	<h2 align="center">Edit Data Provider</h2>
	<center>
	<table>
		<tr>
			<td>Nama Provider</td>
			<td>
				<input type="text" name="npro" value="<?php echo $result['nama_provider']?>">
			</td>
		</tr>



		<tr>
			<td>Id Supplier (Nama Supplier)</td>
			<td>
				<select name="idsup" value="<?php echo $result['id_supplier']?>">
			  <?php 
              $load_id = $koneksi->prepare("SELECT * FROM supplier ORDER BY nama_supplier ASC");
              $load_id->execute();
               while($value=$load_id->fetch())
               {
                echo '<option value="'.$value['id_supplier'].'">'.$value['nama_supplier'].'</option>';
              }
              ?>
              <select>
			</td>
		</tr>


		<tr>
			<td>Id Tarif (Pilihan Tarif)</td>
			<td>
				<select name="idtarif" value="<?php echo $result['id_tarif']?>" >
			  <?php 
              $load_idtar = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY id_tarif ASC");
              $load_idtar->execute();
               while($value=$load_idtar->fetch())
               {
                echo '<option value="'.$value['id_tarif'].'">'.$value['pil_tarif'].'</option>';
              }
              ?>
				</select>
			</td>
		</tr>


		<tr>
			<td>Harga Jual</td>
			<td>
				<select name="hjual" value="<?php echo $result['harga_jual']?>" >
			  <?php 
              $load_idharga = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY harga_jual ASC");
              $load_idharga->execute();
               while($value=$load_idharga->fetch())
               {
                echo '<option value="'.$value['id_tarif'].'">'.$value['harga_jual'].'</option>';
              }
              ?>
				</select>
			</td>
		</tr>


		<tr>
			<td></td>
			<td>
				<input type="submit" name="edit" value="Edit">
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
