<?php
    
     $conn = new mysqli("localhost","root","","senior project");
    
    if ($conn -> connect_error) {
        die("con failed");
        echo"error";
    }
    
    $Sname = $_POST['Sname'];
    $Spass = $_POST['Spass'];
    $SEmail = $_POST['SEmail'];
    $SMN = $_POST['SMN'];
                        
    $x ="insert into staff(Sname, Spassword, SEmail, MN) VALUES ('$Sname','$Spass','$SEmail','$SMN');";
    
    
    if(mysqli_query($conn, $x)){
		header('Location: staff page.html');
    }else{
       die($conn->connect_error);
       echo "Sorry";
        
    }
        
    
    
    
   
?>
		