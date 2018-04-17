<?php
     $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
	session_start();
	      $_SESSION["sf"] = 0;/*to avoid the Undefined index erorr*/
		  $_SESSION["sn"] = 0;/*to avoid the Undefined index erorr*/
		  $_SESSION["smn"] = 0;/*to avoid the Undefined index erorr*/
		  $_SESSION["son"] = 0;/*to avoid the Undefined index erorr*/
		  $_SESSION["se"] = 0;/*to avoid the Undefined index erorr*/
    $Sname = $_POST['Sname'];
    $Spass = $_POST['Spass'];
    $SEmail = $_POST['SEmail'];
	$SON = $_POST["SON"];
    $SMN = $_POST['SMN'];
	$state = true;
      if(!empty($Sname)and !empty($Spass)and !empty($SEmail)and !empty($SON)and !empty($SMN)){
		  
		  if(filter_var($SEmail, FILTER_VALIDATE_EMAIL)){
			  
			  }else{
		  $state = false; 
	      $_SESSION["sf"] = 2;/* the Email is incorect*/
		  }
			if (is_numeric($SMN)){
				
				}else{
		  $state = false;
		  session_start();
	      $_SESSION["smn"] = 1;/* the mobile number is incorect*/
		  }	
				if (ctype_alpha($Sname)){
					
					}else{
		  $state = false;
		  session_start();
	      $_SESSION["sn"] = 1;/* the name is incorect */  
		  }
			if (is_numeric($SON)){
				
				}else{
		  $state = false;
		  session_start();
	      $_SESSION["son"] = 1;/* the Office Number is incorect*/
		  }	
	  
		  if($state){
			  /*check if the Email is in the database*/
			$c = $conn->prepare("select * from staff where SEmail = ?;");
			$c->bind_param("s" , $SEmail);
			$c->execute();
			$result = $c->get_result();
			$c = $result->num_rows;
			
			if($c == 0){/*check if the Email is in the database Enter the new Email*/
    $x = $conn -> prepare("insert into staff(Sname, Spassword, SEmail, SOffice, MN) VALUES (?,?,?,?,?);");
	$x->bind_param("sssis", $Sname, $Spass, $SEmail, $SON, $SMN);
			$result = $x->execute();
			if($result){
	/*after Enter the new Doctor to the database get his ID and send it to other pages */
	$Q= "select * from staff where SEmail = '$SEmail' AND Spassword = '$Spass' ;";
    $result= mysqli_query($conn,$Q);
        
        $row = $result->fetch_assoc();
        $_SESSION["ID"]  =  $row["SID"] ;
    
	header("Location:staff page.php");	
			}else{
		  session_start();
	      $_SESSION["sf"] = 1;/*connection fields*/
		  header("Location:staff form.php");}
			}else{
				session_start();
				$_SESSION["se"] = 1;/*Email is already in the system*/
				header("Location:staff form.php");
				}
		  }else{header("Location:staff form.php");}				
	  }else {
		  session_start();
	      $_SESSION["sf"] = 3;/*Please fill in all fields*/
		  header("Location:staff form.php");
	  }                    
	  
?>