<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
	
    <title>Untitled Document</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css"> 
<script src="jquery-2.2.0.js" type=text/javascript></script>
<?php    
$polaczenie=@mysqli_connect('localhost','root','') 
or die('Błąd połączenia z serwerem.'.@mysqli_error()); 
    
$database=mysqli_select_db($polaczenie,'pracownicy')
or die('Nie można połączyć z bazą danych.'.mysqli_error());
	
$ses=@$_GET['ses'];  


if (@$_POST['tab']!==null){
	$tab=@$_POST['tab'];
    setcookie("Name", $tab);
}
else{
	$tab=@$_COOKIE["Name"];
}
if (@$_POST['kol']!==null){
	$kol=@$_POST['kol'];
    setcookie("Name5", $kol);
}
else{
	$kol=@$_COOKIE["Name5"];
}    
if (@$_POST['a']!==null){
	$a=@$_POST['a'];
    setcookie("Name1", $a);
}
else{
	$a=@$_COOKIE["Name1"];
}
if (@$_POST['b']!==null){
	$b=@$_POST['b'];
    setcookie("Name2", $b);
}
else{
	$b=@$_COOKIE["Name2"];
}
if (@$_POST['inv']!==null){
	$inv=@$_POST['inv'];
    setcookie("Name3", $inv);
}
else{
	$inv=@$_COOKIE["Name3"];
}   
if (@$_POST['inv2']!==null){
	$inv2=@$_POST['inv2'];
    setcookie("Name4", $inv2);
}
else{
	$inv2=@$_COOKIE["Name4"];
}      

if(isset($inv)){
echo("<style type='text/css'>
#form3{
display:none;
}</style>
");
}

if(isset($inv2)){
echo("<style type='text/css'>
#form1{
display:none;
}</style>
");
}	

	
	
If(isset($ses)){
	$tab=0;
	foreach ( $_COOKIE as $key1 => $value1 )
        setcookie($key1, $value1, 1);
}	

	
$tab1=@mysqli_query($polaczenie,$tab);    

?>    
 
<body>
<div id='top'>
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
	
        
    <?php
		$i=1;
		$tabs=array();
        $zm=@$_GET['sort'];
        If(isset($kol)){
        $m1=$tab." WHERE ".$kol." BETWEEN '".$a."' AND '".$b."'";   
        $tab1=mysqli_query($polaczenie,$m1);    
		if($tab1){
        $row=mysqli_fetch_assoc($tab1);
		if($row){	
        echo ("<table class='table-fill' id='t16'> <tr>");
		foreach($row as $key => $value){
        echo("<th> <a href='ran.php?sort=".((@$_GET['sort']==-$i)?$i:-$i)."'>".$key."</a> </th>");
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
        
        $q02=$m1." ".@$q1;    
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
		} } }
    ?>
    <br>    
    <form id='form1' class="formu" action="ran.php" method="post">
		Query: <br><input type="text" name='tab' class='inpu'> <br>
              <input type="hidden" name='inv2'>
              <button type='submit'>Send</button>
    </form>	<br>   
    <form id='form3' class="formu" action="ran.php" method="post">
		<?php
        if(isset($inv2)) {
          echo("Kolumna:<br><select name='kol'>");        
          $row=mysqli_fetch_assoc($tab1);
          foreach($row as $key => $value){
            echo("<option>".$key."</option>");     
            $tabs[$i]=$key;
		    $tabs[-$i]=$key;
		    $i++;
		  }
          echo("</select><br>") ;
          echo("Od<br> <input name='a'><br>");  
          echo("Do <br><input name='b'onkeypress><br>");
          echo("<input type='hidden' name='inv' value=2>");     
          echo(" <button type='submit'>Wyślij</button>"); 
        }
        ?>
        
    </form>	<br> 
        
    </div>
    
    <div id='foot'>
    <h3> Przemysław Wiczołek</h3>
    </div>
    

</body>
<script src="rain.js" type="text/javascript"></script>
    
    
</html>