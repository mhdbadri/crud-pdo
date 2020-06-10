<?php 

if (!defined('BADRI') == TRUE)
{
	header("location:");
} 

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$name = "hasbiponsel";


$koneksi = new PDO ("mysql:host=" . $host . ";
					dbname=" . $name . "",
					$user, $pass);
 ?>