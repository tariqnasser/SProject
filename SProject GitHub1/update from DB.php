<?php
   
    $conn = new mysqli("sql108.hostkda.com","hkda_21504057","tark12345","hkda_21504057_sproject");
    
    if ($conn -> connect_error) {
        die("con failed");
    }
		
		
	if(!empty ($_POST['days'])){
		$Ttime = $_POST['Ttime'];
        $Tduration= $_POST['Tduration'];
		$Tname = $_POST['Tname'];
		$Troom= $_POST['Troom'];
		$T =  $_POST['D'];
		foreach($_POST['days'] as $Tday) {
			// create a prepared update statement
			$x ="update task set Ttime= '$Ttime', Tname='$Tname', Tday= '$Tday', Troom= '$Troom', Tduration= '$Tduration' where TID='$T';";
		if(mysqli_query($conn, $x)){
          header('Location: update page.php');
        echo "done successfuly";
		echo "";
    }else{
       die($conn->connect_error);
       echo "Sorry";
        
    }
		}
		
		
	}else{
		echo "you have to select day";
		
		}
?>
	