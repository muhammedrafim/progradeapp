<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        
    
    $data = json_decode(file_get_contents('php://input'), true);
        
        
    if ( isset( $data ) ) {
       
        
        $cla = $data["cla"];
        $tablename = "institute_class";
    
        $query = "SELECT subject FROM $tablename WHERE class_name='$cla'";
        $result = mysqli_query($conn,$query);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
           echo $r['subject']; 
        }
    }
    else{
        echo "Application error";
    }  
}
else{
    // Prevent accessing form via URL
    echo "Authentication failure";
}
?>