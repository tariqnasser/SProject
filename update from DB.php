<?php
   
    $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
    }
		$id;
 session_start();
       $id = $_SESSION["ID"];
	   $_SESSION["uf"] = 0; /*to avoid the Undefined index erorr*/
	   if($id==0){header('Location:index.php');}
		
	
		$Tday = $_POST['day'];
		$Ttime = $_POST['Ttime'];
        $Tduration= $_POST['Tduration'];
		$Tname = $_POST['Tname'];
		$Troom= $_POST['Troom'];
		$TID =  $_POST['TID'];
		$state = true;
		
		if (is_numeric($TID)){
					
					}else{
		  $state = false;
		  session_start();
	      $_SESSION["uti"] = 1;/* the ID must be numbers only */
		  header("Location:update page.php");
			  
		  }	
		  if(!empty($TID)){
	
    }else{
	$state=false;
	$_SESSION["uti"]=2;/* the ID is empty */
	header("Location:update page.php");
          }
	if(!empty($Tday)and !empty($Tname)and !empty($Troom)and !empty($Ttime)and !empty($Tduration)){
		
	}else{
		session_start();
		$_SESSION["uf"]=1;/*the all fieldes are empty*/
		$state = false;
		}
		
		
		if($state){
			// create a prepared update statement
			$x = $conn -> prepare ("update task set Ttime=?, Tname=?, Tday=?, Troom=?, Tduration=? where SID=? AND TID=?;");
			$x ->bind_param("sssssii",$Ttime, $Tname, $Tday, $Troom, $Tduration, $id, $TID);
			$result = $x-> execute();
			
		if($result){
       header("Location:update page.php");
    }else{
		$_SESSION["uf"]=2;/*connection field*/
		$state = false;
       header("Location:update page.php");
        
		}
		}else{header("Location:update page.php");}/*if any erorr ocure */
	 
?>
	