<?php
function login () {
     $conn = new mysqli("sql108.hostkda.com", "hkda_21504057", "tark12345","hkda_21504057_sproject");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
    global $ID;
        $SEmail= $_POST['SEmail'];
	$Spassword = $_POST['Spassword'];
             
	$Q= "select * from staff where SEmail = '$SEmail' AND Spassword = '$Spassword' ;";
        $result= mysqli_query($conn,$Q);
	$get = mysqli_num_rows($result);
       // echo $get." row";
	if($get > 0){
                  while($row = $result->fetch_assoc()) {
       $GLOBALS['ID']=  $row["SID"] ;
    } 
		header("Location:staff page.php");
		echo "done successfuly";		
	}else{
	header("Location:index.php");
           echo $get." row";
	echo "Sorry";
	}	
}
function getid (){
	
	$GLOBALS['ID'];
}


?>		