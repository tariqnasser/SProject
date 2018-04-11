<!DOCTYPE html>
<html>
<head>
<title>Delete Page</title>
<link rel="stylesheet" href="the style.css">
</head>
<body>
<div>
<h1>Robotic Guide System (FCIT)</h1>


<?php


    $conn = new mysqli("localhost","root","","senior project");
	
	if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
	
       $id;
 session_start();
       $id = $_SESSION["ID"];
	   if($id==0){header('Location:index.php');}
	   
       $get = "select * from task where SID = '$id' ;";
	   $result= mysqli_query($conn,$get);
	   $numRow = mysqli_num_rows($result);
    
     if ($numRow > 0){
         
        
        echo "<table border=2>";
         echo"<tr>";
		  echo" <th>Tsak ID</th>";
		  echo" <th>Task name</th>";
		  echo" <th>Task room</th>";
		  echo" <th>Task day</th>";
		  echo" <th>Task time</th>";
          echo" <th>Task duration</th>";
		  echo" </tr>";
		   foreach($result as $row) {
           echo"<tr>";
		  echo" <td>".$row['TID']."</td>";
		  echo" <td>".$row['Tname']."</td>";
		  echo" <td>".$row['Troom']."</td>";
		  echo" <td>".$row['Tday']."</td>";
		  echo" <td>".$row['Ttime']."</td>";
                  echo" <td>".$row['Tduration']."</td>";
		  echo" </tr>";
           
        }
        echo "</table>";
    } else {
        echo '<h2>No Tasks are found !!</h2>';
    

}

?>
<?php
	if(isset($_SESSION["dt"])){
	$x = $_SESSION["dt"];
	if($_SESSION["dt"]==1){
		echo"<br><span style='background-color:Tomato;'>The ID must be numbers only</span>";
		$_SESSION["dt"]=0;
	}
	if($_SESSION["dt"]==2){
		echo"<br><span style='background-color:Tomato;'>The ID Empty</span>";
		$_SESSION["dt"]=0;
	}
	if($_SESSION["dt"]==3){
		echo"<br><span style='background-color:Tomato;'>Connection failed, please try again</span>";
		$_SESSION["dt"]=0;
	}}
?>
<br><br><span>Write Task ID :</span><br><br>
<form action="delete task from DB.php" method="POST">
<input type="text" name="D"/>
<input class="button" type="submit" style = "font-size:20" value="Delete Task"/><br><br>
<button formaction="staff page.php" style = "font-size:20" >Back</button>
</form>

</div>
</body>

</html>
