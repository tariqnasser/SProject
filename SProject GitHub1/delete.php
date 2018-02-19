<!DOCTYPE html>
<html>

<title>


</title>

<body>

<h1>Robotic Guide system (FCIT)</h1>

<h3>you can Delete your Tasks</h3>

<?php

  //require('./login.php');
  
//echo $GLOBALS['ID'];
     
    //$get = "select * from task where SID = '$GLOBALS['ID']' ;";
      $get = "select * from task ;";
     $conn = new mysqli("sql108.hostkda.com", "hkda_21504057", "tark12345","hkda_21504057_sproject");
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

<p>Write Task ID to delete it:</p>
<form action="delete task from DB.php" method="POST">
<input type="text" name="D"/>
<input type="submit" value="Delete Task"/><br><br>
</form>


</body>

</html>
