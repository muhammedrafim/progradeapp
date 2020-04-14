<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        $cla = $data['cla'];
        $tablename = 'institute_class';
        $query = "SELECT batch FROM $tablename WHERE class_name = '$cla'";
        $result = mysqli_query($conn,$query);
//
        $number = mysqli_num_rows($result);


$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    
    $res = $r["batch"];
    //echo str_replace('\\','',$res);
    echo $res;
    //if(--$number===0)echo "";else echo ",";
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