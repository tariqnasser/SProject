<html>

<head>
<title>Robotic Guide </title>
<link rel="stylesheet" href="LoginStyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Robotic Guide System</h1>
<div id="loginDiv"> 

<?php 
session_start();
$_SESSION["ID"]=0;/*For Logout*/
if (isset($_SESSION["incorect"])){
$x = $_SESSION["incorect"];
if($x == 1){
echo"<span style='background-color:Tomato;'>Please Enter your Email and Password</span>";
$_SESSION["incorect"]=0;
}else if ($x==2){
	echo"<span style='background-color:Tomato;'>you have Entered incorect Email or Password</span>";
	$_SESSION["incorect"]=0;
}
}
?>
<form  method="POST">

<input  type="text" style = "font-size:17px" placeholder="Email Address" name="SEmail"><br><br>

<input class="input" type="password" style = "font-size:17px" placeholder="Password" name="Spassword"><br><br>

<button id = "loginButton" formaction= "login.php" style = "font-size:20">Login</button>
<button formaction="staff form.php" style = "font-size:20">Register</button>
</form></div>
</body>


</html>