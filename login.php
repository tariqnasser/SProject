<?php
     $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
        $SEmail= $_POST['SEmail'];
	$Spassword = $_POST['Spassword'];
       if(!empty($SEmail)and!empty($Spassword)){
		
	$get = $conn->prepare("select * from staff where SEmail = ? AND Spassword = ? ;");
	$get->bind_param("ss",$SEmail,$Spassword);
	$get->execute();
	$result = $get->get_result();
	$get = $result->num_rows;

		if($get == 1){
        $row = $result->fetch_assoc();

        session_start();
        $_SESSION["ID"]  =  $row["SID"] ;
    
		header("Location:staff page.php");		
	}else{
	session_start();
	$_SESSION["incorect"] = 2;/*if the SEmail or Spassword are incorect*/
	header("Location:index.php");     
	}	
	   }else{
	session_start();
	$_SESSION["incorect"] = 1;/*if the SEmail or Spassword are empty*/
	header("Location:index.php");
		   
	   }
	   
?>		