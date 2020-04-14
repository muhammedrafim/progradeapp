<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["b"];
        
    if ( isset( $data ) ) {
       
        
        $tablename = "user_student";
        $cla = $data["cla"];
        $batch = $data["batch"];
    
        //update database
        if($batch=="all"){
            
            $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE class='$cla'");
        }
        else{
            
            $max = countrows($conn,"SELECT count(*) FROM $tablename  WHERE (class='$cla' AND batch='$batch')");
        }
        echo $max;
    }
    else{
        echo "Application error";
    }  
}
else{
    // Prevent accessing form via URL
    echo "Authentication failure";
}

function countrows($conn,$querry){
    $count_res = mysqli_query($conn,$querry );
    $count = mysqli_fetch_array($count_res);
    return $count[0];
}
?>