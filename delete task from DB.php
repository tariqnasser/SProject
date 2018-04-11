<?php
       
 $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
	//use the session to get the id from the login page (index page).
	$id;
 session_start();
       $id = $_SESSION["ID"];
	   $_SESSION["dt"]=0;
	   if($id==0){header('Location:index.php');}
   $TID =  $_POST['D'];
   $state=true;
   if (is_numeric($TID)){
					
					}else{
		  $state = false;
	      $_SESSION["dt"] = 1;/* the ID is not int */
		  header("Location:delete.php");
		  }	
if(!empty($TID)){
	
}else{
	$state=false;
	$_SESSION["dt"]=2;/* the ID is empty */
	header("Location:delete.php");
}
	if($state){
   //prepared statment
   $x=$conn -> prepare ("delete  from task where TID = ? ;");
	$x ->bind_param("i",$TID);
	$result = $x-> execute();
	
	if($result){
         header('Location:delete.php');
    }else{
		$_SESSION["dt"]=3;/*connection failed*/
       header("Location:delete.php");   
    }
	}
?>	


                        
   