<!DOCTYPE html>
<html>
<link rel="stylesheet"href="assets/css/style.css">
<div >
	<nav class="navbar">
	<div class="navbar-left">

		<li><a href="index1.php">Home</a></li>

		<li><a> Manajemen Data </a> 
				<ul class="dropdown-list">
					<li><a href="customer_tampil.php?halaman=customer_tampil">Data Customer</a></li>
					<li><a href="supplier_tampil.php?halaman=supplier_tampil">Data Supplier</a></li>
					<li><a href="tarif_tampil.php?halaman=tarif_tampil">Data Tarif</a></li>
					<li><a href="provider_tampil.php?halaman=provider_tampil">Data Provider</a></li>

				</ul>
		</li>

		<!-- <a href="index1.php">Home</a>
		<a href="customer_tampil.php?halaman=customer_tampil">Data Customer</a>
		<a href="supplier_tampil.php?halaman=supplier_tampil">Data Supplier</a>
		<a href="tarif_tampil.php?halaman=tarif_tampil">Data Tarif</a>
		<a href="provider_tampil.php?halaman=provider_tampil">Data Provider</a> -->
		<li><a href="orderan_tampil.php?halaman=provider_tampil">Data Order</a></li>
		<li><a class="logout" href="logout.php?">Log Out</a></li>

</div>
</nav>
</div>
</html>