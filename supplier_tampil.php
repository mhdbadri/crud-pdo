<?php 
include "koneksi.php";
 
$sql = "SELECT * FROM supplier";
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

	
	<br>
	<br>
			<h2 align="center">Data Supplier</h2>
			<br>
			
			<thead>
			<table>
				<div class="tr1">
				<tr>
					<th>No</th>
					<th>ID Supplier</th>
					<th>Nama Supplier</th>
					<th>No HP Supplier</th>
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
					<td><?php echo $row['id_supplier']; ?></td>
					<td><?php echo $row['nama_supplier']; ?></td>
					<td><?php echo $row['nohp_supplier']; ?></td>
					<td width="90px" align="center">
					<a class="edit" href="supplier_edit.php?id=<?php echo $row['id_supplier']; ?>">Edit</a>
					<a class="hapus" href="supplier_hapus.php?id=<?php echo $row['id_supplier']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
					</td>
				</tr>
			<tbody>
			<?php } ?>

			</table> 


			<br>
			

			<div align="center">
			<a href="supplier_input.php">
			<button class="input">Tambah</button>
			</a>
			</div>

			<br>
			
</div>

		<div>
			<?php include "footer.php"; ?>
		</div>

</body>