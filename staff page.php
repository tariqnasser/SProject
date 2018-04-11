<html>
<head>
<title>Staff Page</title>
<link rel="stylesheet" href="the style.css">
</head>
<body>
<div>
<h1>Robotic Guide System Related To (FCIT) Staff </h1>


<form>

<span><button formaction="task form.php">Add Task</button></span>
<span><button formaction="delete.php">Delete Task</button></span>
<span><button formaction= "update page.php">Update Task</button></span>
<span><button formaction="index.php">Logout</button></span>
</form>
<br><span>These are your tasks</span><br><br>
<?php


    $conn = new mysqli("localhost","root","","senior project");
	
	if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
	
       $id;
 session_start();
       $id = $_SESSION["ID"]  ;
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
</div>
</body>

</html>
