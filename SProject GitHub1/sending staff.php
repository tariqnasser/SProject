<?php
    header('Location: staff page.html');
     $conn = new mysqli("sql108.hostkda.com", "hkda_21504057", "tark12345","hkda_21504057_sproject");
    
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
        echo "done successfuly";
    }else{
       die($conn->connect_error);
       echo "Sorry";
        
    }
        
    
    
    
   
?>
		