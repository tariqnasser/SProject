<!DOCTYPE html>
<html>

<title>


</title>

<body>

<h1>Robotic Guide system (FCIT)</h1>

<h3>you can upadte your Tasks</h3>

<?php


    
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

<p>Write Task ID to update it:</p>
<form action="update from DB.php" method="POST">
<input type="text" name="D"/><br><br>

<p>Now enter the task </p>
        
            <span>Day</span><br>
            <input type="radio" name="days[]" value="Sunday"/><span>Sunday</span>
            <input type="radio" name="days[]" value="Monday"/><span>Monday</span>
            <input type="radio" name="days[]" value="Tuseday"/><span>Tuseday</span>
            <input type="radio" name="days[]" value="Wensday"/><span>Wensday</span>
            <input type="radio" name="days[]" value="thrsday"/><span>thrsday</span>
            <br><br>
            
            <span>Task Name</span><input type="text" name="Tname"/><br><br>
            <span>Task Room</span><input type="text" name="Troom"/><br><br>
            <span>Start Time</span><Select name="Ttime">
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                </Select><br><br>
            <span>Task Duration</span><Select name="Tduration">
                <option value = "50">50 Minutes</option>
                <option value = "80">80 Minutes</option>
            </select><br><br>
            
            <input type="submit" value="Submit"/>
        </form>
        
    
</body>

</html>
