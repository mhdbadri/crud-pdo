<?php 
include "koneksi.php";
 
$sql = "SELECT * FROM tarifpulsa";
$stmt = $koneksi->prepare($sql);
$stmt->execute();

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

			<h2 align="center">Data Tarif Pulsa</h2>
			<br>
			
			<thead>
			<table>
				<div class="tr1">
				<tr>
					<th>No</th>
					<th>ID Tarif</th>
					<th>Pilihan Tarif</th>
					<th>Harga Modal</th>
					<th>Harga Jual</th>
					<th>Aksi</th>
					
				</tr> 
				</div>
			</thead>

				<?php 
				$no = 1;
				?>

				<?php while ($row = $stmt->fetch()){ ?>
			<tbody>
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo $row['id_tarif']; ?></td>
					<td><?php echo $row['pil_tarif']; ?></td>
					<td><?php echo $row['harga_modal']; ?></td>
					<td><?php echo $row['harga_jual']; ?></td>
					<td width="90px" align="center">
					<a class="edit" href="tarif_edit.php?id=<?php echo $row['id_tarif']; ?>">Edit</a>
					<a class="hapus" href="tarif_hapus.php?id=<?php echo $row['id_tarif']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
					</td>
				</tr>
			<tbody>
			<?php } ?>

			</table> 


			<br>
			

			<div align="center">
			<a href="tarif_input.php">
			<button class="input">Tambah</button>
			</a>
			</div>
			<br>
		<div>
			<?php include "footer.php"; ?>
		</div>
	

</div>

		
</body>