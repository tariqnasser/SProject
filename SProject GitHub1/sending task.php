<?php
    header('Location: task form.html');
    $conn = new mysqli("sql108.hostkda.com","hkda_21504057","tark12345","hkda_21504057_sproject");
    
    if ($conn -> connect_error) {
        die("con failed");
    }
		// require(' ./login.php');
		
	if(!empty ($_POST['days'])){
		$Ttime = $_POST['Ttime'];
                $Tduration= $_POST['Tduration'];
		$Tname = $_POST['Tname'];
		$Troom= $_POST['Troom'];
		
		foreach($_POST['days'] as $Tday) {
			//$x ="insert into task(SID,Ttime, Tname, Tday, Troom, Tduration) VALUES ('$GLOBALS['ID']','$Ttime','$Tname','$Tday','$Troom','$Tduration');";
                        $x ="insert into task(Ttime, Tname, Tday, Troom, Tduration) VALUES ('$Ttime','$Tname','$Tday','$Troom','$Tduration');";
		if(mysqli_query($conn, $x)){
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
	