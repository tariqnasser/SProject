<?php
    $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
    }
       $id;
       session_start();
       $id = $_SESSION["ID"]  ;
	   $_SESSION["tf"]=0; /*to avoid the Undefined index erorr*/
       if($id==0){header('Location:index.php');}
	    $days = $_POST['days'];
		$Ttime = $_POST['Ttime'];
        $Tduration= $_POST['Tduration'];
		$Tname = $_POST['Tname'];
		$Troom= $_POST['Troom'];
		$state = true;
	if(!empty($days)and !empty($Tname)and !empty($Troom)and !empty($Ttime)and !empty($Tduration)){
		
	}else{
		session_start();
		$_SESSION["tf"]=1;/*the all fieldes are empty*/
		$state = false;
		}
		
		
		
		if($state){
		foreach($_POST['days'] as $Tday) {
			$x =$conn-> prepare("insert into task(SID,Ttime, Tname, Tday, Troom, Tduration) VALUES (?,?,?,?,?,?);");
		    $x->bind_param("isssss", $id, $Ttime, $Tname, $Tday, $Troom, $Tduration);
            $result = $x->execute();		
		}
		if($result){
       header("Location:task form.php");
    }else{
		$_SESSION["tf"]=2;/*connection field*/
       header("Location:task form.php");
        
    }
		}else{header("Location:task form.php");}/*if any erorr ocure */
		
		
		
	
?>
	