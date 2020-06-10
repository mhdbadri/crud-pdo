<?php
    include 'koneksi.php'; 
    if(isset($_POST['simpan']))
    {
      $user = $_POST['user'];
      $nohp = $_POST['nohp'];
      $idcustomer = $_POST['idcus'];
      $idprovider = $_POST['idprovider'];
      $idtarif = $_POST['idtarif'];
      $jual = $_POST['hjual'];
      $tgl = $_POST['tglorder'];
      $sql = "INSERT INTO orderan VALUES ('', :id_user, :nohp_customer, :id_customer, :id_provider, :id_tarif, :harga_jual, :tgl_order)";


      $stmt = $koneksi->prepare($sql);
      $stmt->bindParam(":id_user", $user);
      $stmt->bindParam(":nohp_customer", $nohp);
      $stmt->bindParam(":id_customer", $idcustomer);
      $stmt->bindParam(":id_provider", $idprovider); 
      $stmt->bindParam(":id_tarif", $idtarif);
      $stmt->bindParam(":harga_jual", $jual);
      $stmt->bindParam(":tgl_order", $tgl);
      $stmt->execute();
  header("location:orderan_tampil.php");
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
	<h2 align="center">Tambah Data Orderan</h2>
	<center>
	<table>

		<tr>
			<td>Id User (Nama Penjual)</td>
			<td>
				<select name="user" >
			  <?php 
              $load_user = $koneksi->prepare("SELECT * FROM userr ORDER BY id_user ASC");
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
			<td>
				<input type="text" name="nohp" placeholder="Masukkan No HP Customer">
			</td>
		</tr>



		<tr>
			<td>Id Customer (Nama Customer)</td>
			<td>
				<select name="idcus" >
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
			<td>Id Provider (Nama Provider)</td>
			<td>
				<select name="idprovider" >
			  <?php 
              $load_pro = $koneksi->prepare("SELECT * FROM provider ORDER BY id_provider ASC");
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
			<td>Id Tarif (Nama Provider)</td>
			<td>
				<select name="idtarif" >
			  <?php 
              $load_tar = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY pil_tarif ASC");
              $load_tar->execute();
               while($value=$load_tar->fetch())
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
				<select name="hjual" >
			  <?php 
              $load_hjual = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY harga_jual
               ASC");
              $load_hjual->execute();
               while($value=$load_hjual->fetch())
               {
                echo '<option value="'.$value['id_tarif'].'">'.$value['harga_jual'].'</option>';
              }
           	  ?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Tanggal Pembelian</td>
			<td>
				<input type="date" name="tglorder">
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
	
</body>



