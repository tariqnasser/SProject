<html>
<head>
<title>Update Page</title>
<link rel="stylesheet" href="the style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="boot.css">
</head>
<body>
<div>
<h1>Robotic Guide System Related To (FCIT)</h1>

<form action="update from DB.php" method="POST">
<?php
         if(isset($_SESSION["uti"])){
		 $x = $_SESSION["uti"];
		 if($_SESSION["uti"] == 1){
		 echo"<br><span style='background-color:Tomato;'>The ID must be number</span><br>";
		 $_SESSION["uti"] = 0;
		}
		if($_SESSION["uti"] == 2){
		echo"<br><span style='background-color:Tomato;'>The ID Empty</span>";
		$_SESSION["uti"]=0;
	}
		}
?>
<?php
		 if(isset($_SESSION["uf"])){
		 $x = $_SESSION["uf"];
		 if($x == 1){
		 echo"<span style='background-color:Tomato;'>Please fill in all fields</span><br>";
		 $_SESSION["uf"] = 0;
		 }
		 if($x == 2){
		 echo"<span style='background-color:Tomato;'>Connection fields, please try agine</span><br>";
		 $_SESSION["uf"] = 0;
		 }
		 }
		 
		 ?>
<span>Write Task ID </span>
<input type="text" name="TID"/><br>
      <img id = "updateImg" src = "robot in the office_0.jpg">
            <span>Day </span>
            <input class = "radio" type="radio" name="day" value="Sunday"/><span>Sunday</span>
            <input class = "radio" type="radio" name="day" value="Monday"/><span>Monday</span>
            <input class = "radio" type="radio" name="day" value="Tuseday"/><span>Tuseday</span>
            <input class = "radio" type="radio" name="day" value="Wensday"/><span>Wensday</span>
            <input class = "radio" type="radio" name="day" value="thrsday"/><span>thrsday</span>
            <br><br><br>
            
            <span>Task Name </span><input type="text" name="Tname"/><br><br>
            <span>Task Room </span><input type="text" name="Troom"/><br><br><br>
            <span>Start Time </span><Select name="Ttime" class = "select">
                <option value="8">8</option>
				<option value="8:30">8:30</option>
                <option value="9">9</option>
				<option value="9:30">9:30</option>
                <option value="10">10</option>
				<option value="10:30">10:30</option>
                <option value="11">11</option>
				<option value="11:30">11:30</option>
                <option value="12">12</option>
				<option value="12:30">12:30</option>
                <option value="13">13</option>
				<option value="13:30">13:30</option>
                <option value="14">14</option>
				<option value="14:30">14:30</option>
                <option value="15">15</option>
				<option value="15:30">15:30</option>
                <option value="16">16</option>
				<option value="16:30">16:30</option>
                <option value="17">17</option>
				<option value="17:30">17:30</option>
                <option value="18">18</option>
				<option value="18:30">18:30</option>
                <option value="19">19</option>
				<option value="19:30">19:30</option>
                <option value="20">20</option>
				<option value="20:30">20:30</option>
                <option value="21">21</option>
				<option value="21:30">21:30</option>
                <option value="22">22</option>
				<option value="22:30">22:30</option>
                <option value="23">23</option>
				<option value="23:30">23:30</option>
                </Select>
				
            <span>Task Duration </span><Select name="Tduration" class = "select">
                <option value = "50 Minutes">50 Minutes</option>
                <option value = "80 Minutes">80 Minutes</option>
            </select><br><br><br>
            
		 
            <input class="button" type="submit" value="Submit" style = "font-size:20"/>
			<button style = "font-size:20px; color:white" formaction="staff page.php" style = "font-size:20">Back</button>
			
        </form>
        
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
