<?php 

include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM orderan WHERE id_order = :id_order";

$stmt = $koneksi->prepare($sql);
$stmt->bindParam(':id_order',$id);
$stmt->execute();

$result = $stmt->fetch();

if (isset($_POST['edit']))
{

	$sql2 = "UPDATE orderan SET id_user = :id_user,
								nohp_customerr = :nohp_customerr,
								id_customer = :id_customer,
								id_provider = :id_provider,								
								id_tarif = :id_tarif,
								harga_jual = :harga_jual,
								tgl_order = :tgl_order
								WHERE id_order = :id_order";

	$stmt2 = $koneksi->prepare($sql2);
	$stmt2->bindParam(":id_user", $_POST['user']);
	$stmt2->bindParam(":nohp_customerr", $_POST['nohpcus']);
	$stmt2->bindParam(":id_customer", $_POST['namacus']);
	$stmt2->bindParam(":id_provider", $_POST['idprovider']);
	$stmt2->bindParam(":id_tarif", $_POST['tarif']);
	$stmt2->bindParam(":harga_jual", $_POST['hjual']);
	$stmt2->bindParam(":tgl_order", $_POST['tglorder']);
	$stmt2->bindParam(":id_order", $id);
	$stmt2->execute();

	header("location:orderan_tampil.php");
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
		<h2 align="center">Update Data Orderan</h2>
		<br>

		<form action="" method="POST">
		<table>

			<tr>
				<td>ID Penjual</td>
				<td><select name="user" >
			  <?php 
              $load_user = $koneksi->prepare("SELECT * FROM userr ORDER BY user_name ASC");
              $load_user->execute();
               while($value=$load_user->fetch())
               {
                echo '<option value="'.$value['id_user'].'">'.$value['user_name'].'</option>';
              }
           	  ?>
				</select>
			</td>
			
			</tr>

			<tr>
				<td>No HP Customer</td>
				<td><input type="text" name="nohpcus" value="<?php echo $result['nohp_customerr']?>"></td>
			</tr>

			<tr>
				<td>Id Customer (Nama Customer)</td>
				<td>
					<select name="namacus" >
			  <?php 
              $load_cus = $koneksi->prepare("SELECT * FROM customer ORDER BY nama_customer ASC");
              $load_cus->execute();
               while($value=$load_cus->fetch())
               {
                echo '<option value="'.$value['id_customer'].'">'.$value['nama_customer'].'</option>';
              }
           	  ?>
				</select>
				</td>
			</tr>

			<tr>
				<td>ID Provider (Nama Provider)</td>
   				<td><select name="idprovider" >
			  <?php 
              $load_pro = $koneksi->prepare("SELECT * FROM provider ORDER BY nama_provider ASC");
              $load_pro->execute();
               while($value=$load_pro->fetch())
               {
                echo '<option value="'.$value['id_provider'].'">'.$value['nama_provider'].'</option>';
              }
           	  ?>
				</select>
			</td>

			</tr>

			<tr>
				<td>Tarif</td>
				<td><select name="tarif" >
			  <?php 
              $load_tar = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY pil_tarif ASC");
              $load_tar->execute();
               while($value=$load_tar->fetch())
               {
                echo '<option value="'.$value['id_tarif'].'">'.$value['pil_tarif'].'</option>';
              }
           	  ?>
				</select></td>
			</tr>

			<tr>
				<td>Harga Jual</td>
				<td><select name="hjual" >
			  <?php 
              $load_hjual = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY harga_jual
               ASC");
              $load_hjual->execute();
               while($value=$load_hjual->fetch())
               {
                echo '<option value="'.$value['id_tarif'].'">'.$value['harga_jual'].'</option>';
              }
           	  ?>
				</select></td>
			</tr>

			<tr>
				<td>Tanggal Order</td>
				<td><input type="date" name="tglorder" value="<?php echo $result['tgl_order']?>"></td>
			</tr>

			<tr>
			<td></td>
			<td>
				<input type="submit" name="edit" value="Simpan">
				<input type="reset" name="" value="Reset">
			</td>

		</tr>


		 </table>
		</form>
		<br><br><br>


		</div>
			<div class="footer">
			<?php include "footer.php"; ?>
		</div>
		</div>

		

</body>
</html>