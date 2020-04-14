<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        
    
    $data = json_decode(file_get_contents('php://input'), true);
        
        
    if ( isset( $data ) ) {
       
        
        $cla = $data["cla"];
        $batch = $data["batch"];
        $tablename = "timetable";
    
        $query = "SELECT data FROM $tablename WHERE (class='$cla' AND batch='$batch')";
        $result = mysqli_query($conn,$query);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
           echo $r['data']; 
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