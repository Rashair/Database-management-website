<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Register via php</title>
</head>
<link rel="stylesheet" href="style.css">
<style>
	body {
		text-align: center;
	}
</style>
<?php 
$conn=mysqli_connect('localhost','root','') 
or die('Error when connecting with server.'.mysqli_error()); 
    
$database=@mysqli_select_db($conn,'auth');

if (!$database) {
 $sql = "CREATE DATABASE `auth`;";
	
 if ($conn->query($sql) === TRUE) {}
 else {
    echo 'Error creating database: ' .$conn->error. "\n";
} 
}
mysqli_query($conn,"CREATE TABLE `accounts`
 ( `logins` varchar(64) NOT NULL UNIQUE,
 `passwords` varchar(64) NOT NULL UNIQUE );")	;

	
	$log=@$_POST['log'];
	$pass=@$_POST['pso1'];
	$pass2=@$_POST['pso2'];
	

	

?>

	<body>
		<form class='container' id='frm2' method="post" action="">
			<h1> PHP </h1> Login
			<input type='text' name='log'>
			<br> Password
			<input type='password' name='pso1'>
			<br> Confirm password
			<input type='password' name='pso2'>
			<br>
			<button>Register</button>
		</form>
		<?php
			if(($log!=null)&&($pass!=null)&&($pass2!=null)){
			if($pass!=$pass2){
				echo("<b>Passwords doesn't match.<b>");
				}	
			else{
				mysqli_query($conn,"INSERT INTO accounts VALUES ('$log','$pass');");
				header("Location: index.php");
			}
			}
		
		?> </body>

</html>