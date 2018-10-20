<?php
	$kind=$_GET['kind'];
	if($kind==1){
		header("Location:regjs.php");
		die();
	}
	else if($kind==2){
		header("Location:regphp.php");
		die();
	}
	
?>	
