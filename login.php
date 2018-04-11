<?php
     $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
        $SEmail= $_POST['SEmail'];
	$Spassword = $_POST['Spassword'];
       if(!empty($SEmail)and!empty($Spassword)){
		
	$Q= "select * from staff where SEmail = '$SEmail' AND Spassword = '$Spassword' ;";
    $result= mysqli_query($conn,$Q);
	$get = mysqli_num_rows($result);

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