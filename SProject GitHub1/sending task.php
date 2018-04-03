<?php
    $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
    }
       $id;
       session_start();
       $id = $_SESSION["ID"]  ;
       
		
	if(!empty ($_POST['days'])){
		$Ttime = $_POST['Ttime'];
                $Tduration= $_POST['Tduration'];
		$Tname = $_POST['Tname'];
		$Troom= $_POST['Troom'];
		
		foreach($_POST['days'] as $Tday) {
			$x ="insert into task(SID,Ttime, Tname, Tday, Troom, Tduration) VALUES ('$id','$Ttime','$Tname','$Tday','$Troom','$Tduration');";
                       // $x ="insert into task(Ttime, Tname, Tday, Troom, Tduration) VALUES ('$Ttime','$Tname','$Tday','$Troom','$Tduration');";
		if(mysqli_query($conn, $x)){
			header('Location: task form.html');
    }else{
       die($conn->connect_error);
       echo "Sorry";
        
    }
		}
		
		
	}else{
		echo "you have to select day";
		
		}
?>
	