<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Register via js</title>
</head>
<link rel="stylesheet" href="style.css">
<script src="jquery-2.2.0.js" type=text/javascript></script>

<body>
	<form class='container' id='frm1' onsubmit="return checkit()" method="post" action="index.php  ">
		<h1> Javascript </h1> Login
		<input type='text' id='log' name='log'>
		<br> Password
		<input type='password' id="pso1" name='pso1'>
		<br> Confirm password
		<input type='password' id="pso2">
		<br>
		<button>Register</button>
	</form>
	<script type="text/javascript">
		function checkit() {
			var logn = document.getElementById("log").value;
			var pso1 = document.getElementById("pso1").value;
			var pso2 = document.getElementById("pso2").value;
			if ((logn !== "") && (pso1 !== "") && (pso2 !== "")) {
				if (pso1 != pso2) {
					alert("Passwords don't match.");
					return false;
				}
				else {
					return true;
				};
			}
			else {
				alert("Enter all data.");
				return false;
			}
		}
	</script>
</body>

</html>