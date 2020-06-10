<?php 

if (!defined('BADRI') == TRUE)
{
  header("location:index.php");
} 


if (isset($_POST['login']))
{

    $u_name = htmlentities($_POST['i_name']);
    $u_pass = htmlentities($_POST['i_pass']);
    
  $sql = "SELECT * FROM userr 
  WHERE user_name = :user_name 
  AND user_password = :user_password";

  $stmt = $koneksi->prepare($sql);
  $stmt->bindParam("user_name", $u_name);
  $stmt->bindParam("user_password", $u_pass);
  $stmt->execute();

  if ($stmt->rowCount() > 0)
  {
    $result = $stmt->fetch();
    $_SESSION['user_name'] = $_POST['i_name'];
    $_SESSION['user_namalengkap'] = $result['user_namalengkap'];
    header("location:index1.php");
  } else {
    sleep(5);
    header("location:login.php");
  }
}
 ?>

<html>
  <head>
    <title> Login form </title>
    <link rel="stylesheet" href="assets/css/style1.css">
  

  </head>
  <body>
  <div class="formlogin">
    
    
    <h2>Silahkan Login</h2>
    <img src="assets/images/avatar.png" class="user">
    <form action="" method="POST">
      <p>Username</p>
      <input type="text" name = "i_name" placeholder="Masukkan Username">
     
      <p>Password</p>
      <input type="password" name = "i_pass" placeholder="Masukkan Password">

      <input type="submit" name = "login" value="Login">
      <input type="reset" name = "" value="Reset">
     
      
    </form>
  </div>
  </body>
</html>
</html>
