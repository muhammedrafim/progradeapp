<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
    $tablename = 'user_student';
    $cla = $data["cla"];  
    $inst = 'f'.$data["inst"];
    $filt = $data["filt"];
    if($filt=="All"){
        $count = countrows($conn,"SELECT count(*) FROM $tablename WHERE class='$cla'");
        echo $count;
    } 
    else if($filt=="Paid"){
        $count = countrows($conn,"SELECT count(*) FROM $tablename WHERE (class='$cla' AND $inst='true')");
        echo $count;
    } 
    else if($filt=="Pending"){
        $count = countrows($conn,"SELECT count(*) FROM $tablename WHERE (class='$cla' AND ($inst IS NULL OR $inst='false'))");
        echo $count;
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

function countrows($conn,$querry){
    $count_res = mysqli_query($conn,$querry );
    $count = mysqli_fetch_array($count_res);
    return $count[0];
}
?>