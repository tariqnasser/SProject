<?php
     $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
        $SEmail= $_POST['SEmail'];
	$Spassword = $_POST['Spassword'];
             
	$Q= "select * from staff where SEmail = '$SEmail' AND Spassword = '$Spassword' ;";
        $result= mysqli_query($conn,$Q);
	$get = mysqli_num_rows($result);
       // echo $get." row";
	if($get > 0){
                 while ($row = $result->fetch_assoc()){
        global $ID ;       
        $ID = $row["SID"] ;
        session_start();
        $_SESSION["ID"]  =  $row["SID"] ;
                                }
    
		header("Location:staff page.php");
		echo "done successfuly";		
	}else{
	header("Location:index.php");
           echo $get." row";
	echo "Sorry";
	}	

?>		