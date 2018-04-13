<html>
    <head>
	
        <title>Task Form</title>
		<link rel="stylesheet" href="the style.css">
		<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="boot.css">
    </head>
    <body>
	<?php

$id;
 session_start();
       $id = $_SESSION["ID"]  ;
	   if($id==0){header("Location:index.php");}
?>
         <div>
		 <?php
		 
		 if(isset($_SESSION["tf"])){
		 $x = $_SESSION["tf"];
		 if($x == 1){
		 echo"<span style='background-color:Tomato;'>Please fill in all fields</span><br>";
		 $_SESSION["tf"] = 0;
		 }
		 if($x == 2){
		 echo"<span style='background-color:Tomato;'>connection fields, please try agine</span><br>";
		 $_SESSION["tf"] = 0;
		 }
		 }
		 ?>
        
        <form action="sending task.php" method="POST">
            <span style = "font-size:25px">Task Day :</span>
            <input type="checkBox" name="days[]" value="Sunday"/><span>    &nbsp;Sunday    &nbsp;</span>
            <input type="checkBox" name="days[]" value="Monday"/><span>    &nbsp;Monday    &nbsp;</span>
            <input type="checkBox" name="days[]" value="Tuseday"/><span>    &nbsp;Tuseday    &nbsp;</span>
            <input type="checkBox" name="days[]" value="Wensday"/><span>    &nbsp;Wensday    &nbsp;</span>
            <input type="checkBox" name="days[]" value="thrsday"/><span>    &nbsp;thrsday    &nbsp;</span>
            <br><br><br>
            
            <span style = "font-size:25px">Task Name</span><input type="text" name="Tname"/>
            <span style = "font-size:25px">Task Room</span><input type="text" name="Troom"/><br><br><br>
            <span>Start Time</span><Select name="Ttime">
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
            <span>Task Duration</span><Select name="Tduration">
                <option value = "50">50 Minutes</option>
                <option value = "80">80 Minutes</option>
            </select><br><br><br>
            
            <input class="button" type="submit" value="Submit" style = "font-size:20"/>
			<button style = "font-size:20px; color:white" formaction="staff page.php" style = "font-size:20">Back</button>
        </form>
		<img id ="add" src = "umitkoy-robot-kursu.png"/>
        </div>
    </body>
</html>