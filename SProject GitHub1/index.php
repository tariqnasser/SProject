<html>

<head>
<title>SProject</title>
<link rel="stylesheet" href="indexStyle.css">
</head>
<body>
<?php 
require('./login.php');
?>
<div id="div"> 
    <h2>welcome to Robtic guide system(FCIT)</h2>
<form  method="POST">
<span>user Email</span>
<input type="text" name="SEmail"><br><br>
<span>password</span>
<input type="text" name="Spassword"><br><br>

<button id="login" type="submit"  name= "login">Login</button>
<button id="register" type="submit" formaction="staff form.html">Register</button>
</form></div>

<?php 
if (isset($_POST['login'])){
login();
}
?>
</body>


</html>