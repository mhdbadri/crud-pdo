<?php 

//error_reporting(0);

define('BADRI', TRUE);
include "koneksi.php"; 

?>

<!DOCTYPE html>
<html>	
<head>
	<title>HASBI PONSEL</title>
</head>
<body>
	<div class="utama">
	<div>
		<!--header-->
		<div>
			<?php include "header.php"; ?>
		</div>
		

		<div class="subheader">
			<ul>
				<marquee title="" behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()" direction="right">Selamat Datang <strong><?php echo $_SESSION['user_namalengkap']; ?></strong> di Sistem Rekap Penjualan Pulsa</marquee>
		
			</ul>
		</div>
		<br>

		<!--menu-->
		
		<div>
			<?php include "menu.php"; ?>
		</div>

		
		

		
		<div class="isimenu">
		
		<?php 
			if (isset($_GET['halaman'])) 
			{
				include $_GET['halaman'] . ".php";
			}else {
				include "utama.php";
			}
		 ?>
		</div>

    	
		

		<!--footer-->
		<div>
			<?php include "footer.php"; ?>
		</div>
		
</div>
</body>
</html>