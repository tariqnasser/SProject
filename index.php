<html>

<head>
<title>Robotic Guide </title>
<link rel="stylesheet" href="LoginStyle.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div id="loginDiv" class = "container"> 
<h1 style = "font-size:70px">Robotic Guide System</h1>


<form  method="POST">
<?php 
session_start();
$_SESSION["ID"]=0;/*For Logout*/
if (isset($_SESSION["incorect"])){
$x = $_SESSION["incorect"];
if($x == 1){
echo"<span style='background-color:Tomato;'>Please Enter your Email and Password</span><br>";
$_SESSION["incorect"]=0;
}else if ($x==2){
	echo"<span style='background-color:Tomato;'>you have Entered incorect Email or Password</span><br>";
	$_SESSION["incorect"]=0;
}
}
?>
<input  type="text" style = "font-size:17px" placeholder="Email Address" name="SEmail"><br><br>

<input class="input" type="password" style = "font-size:17px" placeholder="Password" name="Spassword"><br><br>

<button id = "loginButton" formaction= "login.php" style = "font-size:20">Login</button>

<button formaction="staff form.php" style = "font-size:20px">Register</button>

</form></div>
</body>


</html>