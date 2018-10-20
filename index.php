<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
</head>
<link rel="stylesheet" href="style.css">
<script src="jquery-2.2.0.js" type=text/javascript></script>
<?php 

if (@$_POST['log']!==null){
	$logn = @$_POST['log'];
    setcookie("cred", $logn, time()+86400);
}
else{
	$logn=@$_COOKIE["cred"];
}
if (@$_POST['pso1']!==null){
	$passw = @$_POST['pso1'];
    setcookie("cred2", $passw, time()+86400);
}
else{
	$passw=@$_COOKIE["cred2"];
}	

$conn=mysqli_connect('localhost','root','') 
or die('Error when connecting with server.'.mysqli_error()); 
    
$database=mysqli_select_db($conn,'auth');
	
$logp=@$_POST['logp'];
$passp=@$_POST['passp'];
$query=mysqli_query($conn,'Select * from accounts');

	
?>
    <style type="text/css">
        .container {
            width: 300px;
        }
        
        a {
            color: darkgreen;
        }
    </style>

    <body>
        <div id='top'> <img class="image" src="logo.png" alt=""> </div>
        <div id='left1'>
            <form class="container" onsubmit="return getfdata()" action='home.php?cok=1' id='fa1'>
                <h2>Login via javascript </h2> Login
                <input type="text" id='log'>
                <br> Password
                <input type="password" id='pas' onkeypress>
                <br>
                <button type='submit' id='but1'>Log in</button>
            </form>
            <button type='submit' id='but01'>Log in</button>
            <br class='bs1'> You are not registered yet?
            <br> <a href="regi.php?kind=1"> Sign up with javascript.</a>
            <a href=''></a>
        </div>
        <div id='right1'>
            <form class="container" method="post" action="" id='fa2'>
                <h2> Login via php </h2> Login
                <input type="text" name='logp'>
                <br> Password
                <input type="password" name='passp' onkeypress>
                <br>
                <button type='submit'>Log in</button>
                <br>
                <?php 
					if(isset($logp)){
						$i=0;
                        If($query){
						while($tab=mysqli_fetch_assoc($query)){
							if(($logp==$tab['logins'] )&& ($passp==$tab['passwords'])) {
								header("Location: home.php?cok=1");
							}
							else if($i<1){
								echo("<b>Wrong login or password.</b>");
							}
							$i++;
						}
                        }
					} 
				?>
            </form>
            <button type='submit' id='but02'>Log in</button>
            <br class='br1'> You are not registered yet?
            <br> <a href="regi.php?kind=2"> Sign up with php.</a> </div>
        <div id='foot'>
            <h3> Author : <a href="mailto:przemyslaw.wk@gmail.com">Przemysław Wiczołek</a></h3> </div>
    </body>
    <script type="text/javascript">
        var logn = "<?php echo($logn); ?>";
        var passw = "<?php echo($passw); ?>";

        function getfdata() {
            var log = document.getElementById("log").value;
            var pas = document.getElementById("pas").value;
            if ((log == logn) && (pas == passw)) {
                return true;
            } else {
                alert("Wrong login or password.");
                return false;
            }
        }
        $(document).ready(function () {
            $('#fa1').hide();
            $('#fa2').hide();
            $('#but01').click(function () {
                $('#but01').remove();
                $('.bs1').remove();
                $('#fa1').slideDown("slow");
            });
            $('#but02').click(function () {
                $('#but02').remove();
                $('.br1').remove();
                $('#fa2').slideDown("slow");
            });


        });
    </script>

</html>