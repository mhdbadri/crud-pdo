<?php 
include "koneksi.php";
if (isset($_POST['simpan']))
{
	$username = $_POST['user'];
	$pass = $_POST['pass'];
	$ulevel = $_POST['level'];
	$namaleng = $_POST['nama'];

	$sql = "INSERT INTO userr VALUES ('',:user_name, :user_password, :user_level, :user_namalengkap)";

	$stmt = $koneksi->prepare($sql);
	$stmt->bindParam(":user_name", $username);
	$stmt->bindParam(":user_password", $pass);
	$stmt->bindParam(":user_level", $ulevel);
	$stmt->bindParam(":user_namalengkap", $namaleng);
	$stmt->execute();
 	echo "<script>alert('Berhasil Menambah Admin'); 
    window.location='index1.php';</script>";
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
			<?php include "menu1.php"; ?>
		</div>
	
	<div class="isi">
	
	<form action="" method="POST">
	<center>	
	<h2>Tambah Data Admin</h2>
	<center>
	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="user" placeholder="Tambah Nama">
			</td>
		</tr>

		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="pass" placeholder="Tambah Password">
			</td>
		</tr>

		<tr>
			<td>User Level</td>
			<td>
				<input type="text" name="level" placeholder="Tambah Level">
			</td>
		</tr>

		<tr>
			<td>Tambah Nama Lengkap</td>
			<td>
				<input type="text" name="nama" placeholder="Tambah Nama Lengkap">
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
		<div>
			<?php include "footer.php"; ?>
		</div>

</div>

</body>
