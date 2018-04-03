<html>

<title>
</title>

<body>

<h1>Now your in the mine page of the Robotic Guide system (FCIT)</h1>

<h3>you can Add, Delete or Update your Tasks</h3>

<form>

<button formaction="task form.html">Add Task</button><br><br>

<button formaction="delete.php">Delete Task</button><br><br>

<button formaction= "update page.php">Update Task</button>

</form>
<?php
$id;
 session_start();
       $id = $_SESSION["ID"]  ;
$get = "select * from task where SID = '$id' ;";
     $conn = new mysqli("localhost","root","","senior project");
    $response = $conn->query($get);
    if ($response && $response->num_rows > 0) {
         $row;
        
           echo "<table border=2>";
           echo"<tr>";
		  echo" <th>Tsak ID</th>";
		  echo" <th>Task name</th>";
		  echo" <th>Task room</th>";
		  echo" <th>Task day</th>";
		  echo" <th>Task time</th>";
                  echo" <th>Task duration</th>";
		  echo" </tr>";
		   while ($row = $response->fetch_array()) {
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
</body>

</html>
