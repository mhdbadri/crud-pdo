<?php 
include "koneksi.php";
 
$sql = "SELECT * FROM customer";
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
			<h2 align="center">Tabel Data Customer</h2>

			<br>
			<thead>
			<table>
				<div class="tr1">
				<tr>
					<th>No</th>
					<th>ID Customer</th>
					<th>Nama Customer</th>
					<th>No HP Customer</th>
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
					<td><?php echo $row['id_customer']; ?></td>
					<td><?php echo $row['nama_customer']; ?></td>
					<td><?php echo $row['nohp_customer']; ?></td>
					<td width="90px" align="center">
					<a class="edit" href="customer_edit.php?id=<?php echo $row['id_customer']; ?>">Edit</a>
					<a class="hapus" href="customer_hapus.php?id=<?php echo $row['id_customer']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
					</td>
				</tr>
			<tbody>
			<?php } ?>

			</table> 


			<br>
		

			<div align="center">
			<a href="customer_input.php">
			<button class="input">Tambah</button>
			</a>
			</div>
			<br>
			
</div>

		<div>
			<?php include "footer.php"; ?>
		</div>

</body>