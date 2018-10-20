<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Untitled Document</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<script src="jquery-2.2.0.js" type=text/javascript></script>
<style>
	body {
		overflow: hidden;
	}
	

	

</style>
<?php 
$polaczenie=@mysqli_connect('localhost','root','') 
or die('Błąd połączenia z serwerem.'.@mysqli_error()); 
    
$database=mysqli_select_db($polaczenie,'pracownicy')
or die('Nie można połączyć z bazą danych.'.mysqli_error());
	
$cok=@$_GET['cok'];	
		
if (@$_POST['query01']!==null){
	$q01=@$_POST['query01'];
    setcookie("Name", $q01);
}
else{
	$q01=@$_COOKIE["Name"];
}
if(isset($cok))
	$q01="";
?>
<body>

<div id='top'>
    <section class="snow"></section>
	<section class="rain"></section>
	<div id="clouds">
		<div class="cloud x1"></div>
		<div class="cloud x2"></div>
		<div class="cloud x3"></div>
		<div class="cloud x4"></div>
		<div class="cloud x5"></div>
	</div>
</div>
<div id='left3'>
	<div class="container">
		<nav>
			<ul class="mcd-menu">
				<li>
					<a href="home.php?cok=1"> <i class="fa fa-home"></i> <strong>Home</strong> <small>sweet home</small> </a>
				</li>
				<li>
					<a href=""> <i class="fa fa-edit"></i> <strong>Edit or Delete</strong> <small>Tables</small> </a>
					<ul type='none'>
						<li><a href="osoba.php"><i class="fa fa-globe"></i>Osoba</a></li>
						<li> <a href="adres.php"><i class="fa fa-group"></i>Adres</a></li>
						<li> <a href="stanowisko.php"><i class="fa fa-group"></i>Stanowisko</a></li>
					</ul>	
				</li>
				<li>
					<a href="whtab.php"> <i class="fa fa-gift"></i> <strong>Linked table</strong> <small>===everything</small> </a>
				</li>
				<li>
					<a href="ran.php?ses=2"> <i class="fa fa-globe"></i> <strong>Query with range</strong> <small>A-Z or sth</small> </a>
				</li>
				<li>
					<a href=""> <i class="fa fa-comments-o"></i> <strong>Sources</strong> <small>How I really did it.</small> </a>
					<ul type='none'>
						<li>
						<a href="http://www.findsourcecode.com/css/how-to-create-cloud-rain-animation-using-css-jquery/"><i class="fa fa-globe"></i>
						How to create rain and cloud animation.</a></li>
						<li> <a href="http://codepen.io/alassetter/full/cyrfB"><i class="fa fa-group"></i>Beautiful table.</a></li>
						<li><a href="http://codepen.io/rizky_k_r/full/sqcAn/"><i class="fa fa-trophy"></i>Beutfiful menu.</a></li>
					</ul>
				</li>
				
				<li>
					<a href="index.php"> <i class="fa fa-envelope-o"></i> <strong>Log out</strong> <small>or not</small> </a>
				</li>
				</ul>
		</nav>
	</div>
</div>
<div id='right2'>
	<style>
		body {
			font-family: "Roboto", helvetica, arial, sans-serif;
			font-size: 16px;
			font-weight: 400;
			text-rendering: optimizeLegibility;
		}
		
		.table-fill a {
			color: white;
			text-decoration-line: none;
		}
	</style>
        
	<?php
		$i=1;
		$tabs=array();
		$zm=@$_GET['sort'];
        $rs=@mysqli_query($polaczenie, $q01) ;
		if($rs){
        $row=mysqli_fetch_assoc($rs);
        echo ("<table class='table-fill' id='t14'> <tr>");
        foreach($row as $key => $value)
        {echo("<th> <a href='home.php?sort=".((@$_GET['sort']==-$i)?$i:-$i)."'>".$key."</a> </th>");
        $tabs[$i]=$key;
		$tabs[-$i]=$key;
		$i++;
		} 
		echo("</tr>");	
		if($zm<0) 
			$q1='order by '.$tabs[$zm].' ASC';
		if($zm>0)
			$q1='order by '.$tabs[$zm].' DESC';
        $query="SELECT * FROM ".@$tabl." ".@$q1;     	
        
        $q02=$q01." ".@$q1;    
        if ($result = $polaczenie->query($q02)) { 
            $a=-1;
            while ($row1 = $result->fetch_assoc()) {
                echo("<tr>");
                foreach($row1 as $key => $value) {  
                    If($a==-1){$a=$value;}
                    echo("<td>".$row1[$key]."</td>"); 
                }
                echo("</tr>"); 
                $a=-1;
            }    
        }
            
        echo("</table>");
		}
        
    ?>
		<br>
		<form class='formu' action="home.php" method="post">
			Query:<br><input type="text" class='inpu'name='query01'style="width"><br/>
			<button>Send</button>
		</form>
		<br> 
</div>
<div id='foot'>
	<h3> Przemysław Wiczołek</h3> </div>
</body>
<script src="rain.js" type="text/javascript"></script>
</html>