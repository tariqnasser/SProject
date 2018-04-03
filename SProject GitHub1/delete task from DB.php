<?php
       
 $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
   $T =  $_POST['D'];

   $x= "delete  from task where TID = '$T' ;";

	if(mysqli_query($conn, $x)){
         header('Location:delete.php');
        echo "done successfuly";
    }else{
       echo "Sorry".$T;
        
    }
?>	


                        
   