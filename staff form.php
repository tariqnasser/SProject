<html>
    <head>
        <title>Registeration</title>
		<link rel="stylesheet" href="the style.css">
		<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="boot.css">
    </head>
    
	<body>
        <div>
		
		<h1>Registration</h1>
		<?php
			session_start();
			if (isset($_SESSION["sf"])){
			$x = $_SESSION["sf"];
			
			if($x == 1){
				echo"<span style='background-color:Tomato;'>connection fields, please try agine</span><br>";
				$_SESSION["sf"]=0;
			}else if ($x == 2){
				echo"<span style='background-color:Tomato;'>the Email is incorect, please check your Email</span><br>";
				$_SESSION["sf"]=0;
			} else if ($x == 3){
				echo"<span style='background-color:Tomato;'>Please fill in all fields</span><br>";
				$_SESSION["sf"]=0;
			}}
			
			if (isset($_SESSION["sn"])){
			$n = $_SESSION["sn"];
			
			 if ($n == 1){
				echo"<span style='background-color:Tomato;'>Your name must be letters only</span><br>";
				$_SESSION["sn"]=0;
				}
			}
			if (isset($_SESSION["smn"])){
			$m = $_SESSION["smn"];
			 if ($m == 1){
				echo"<span style='background-color:Tomato;'>Your mobile number must be numbers only</span><br>";
				$_SESSION["smn"]=0;
			}}
			if (isset($_SESSION["son"])){
			$o = $_SESSION["son"];
			 if ($o == 1){
				echo"<span style='background-color:Tomato;'>Your office Number must be numbers only</span><br>";
				$_SESSION["smn"]=0;
			}
			}
			?>
			<img id = "reg" src = "umitkoy-robot-kursu.png"/>
        <form action="sending staff.php" method="POST">
	    <span id = "name">Full Name</span><input type="text" name="Sname"/><br><br>
            <span id = "pass">Password</span><input id = "spassInput"type="password" name="Spass"/><br><br>
            <span id = "email">Email</span><input type="text" name="SEmail"/><br><br>
			<span id = "ON">Office Number</span><input type="text" name="SON"/><br><br>
            <span id = "MN">Mobile number</span><input type="text" name="SMN"/><br><br>
            
            
            <input class="button" type="submit" value="Submit" style = "font-size:20px"/>
			<button style = "color:white; font-size:20px;" formaction="index.php">Back</button>
        </form>
		</div>
    </body>
</html>