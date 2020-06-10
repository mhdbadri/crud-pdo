<?php
    include 'koneksi.php'; 
    if(isset($_POST['simpan']))
    {
      $pro = $_POST['provider'];
      $sup = $_POST['idsup'];
      $tarif = $_POST['idtarif'];
      $hjual = $_POST['hjual'];
      
      $sql = "INSERT INTO provider VALUES ('', :nama_provider, :id_supplier, :id_tarif, :harga_jual)";

 
      $stmt = $koneksi->prepare($sql);
      $stmt->bindParam(":nama_provider", $pro);
      $stmt->bindParam(":id_supplier", $sup);
      $stmt->bindParam(":id_tarif", $tarif);
      $stmt->bindParam(":harga_jual", $hjual);
      $stmt->execute();

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
	<h2 align="center">Tambah Data Provider</h2>
	<center>
	<table>
		<tr>
			<td>Nama Provider</td>
			<td>
				<input type="text" name="provider" placeholder="Masukkan Nama Provider">
			</td>
		</tr>



		<tr>
			<td>Id Supplier (Nama Supplier)</td>
			<td>
				<select name="idsup" >
			  <?php 
              $load_idsup = $koneksi->prepare("SELECT * FROM supplier ORDER BY nama_supplier ASC");
              $load_idsup->execute();
               while($value=$load_idsup->fetch())
               {
                echo '<option value="'.$value['id_supplier'].'">'.$value['nama_supplier'].'</option>';
              }
           	  ?>
				</select>
			</td>
		</tr>


		<tr>
			<td>Id Tarif (Pilihan Tarif)</td>
			<td>
				<select name="idtarif" >
			  <?php 
              $load_idtarif = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY pil_tarif ASC");
              $load_idtarif->execute();
               while($value=$load_idtarif->fetch())
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
              $load_hjual = $koneksi->prepare("SELECT * FROM tarifpulsa ORDER BY harga_jual ASC");
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
