<?php
include 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
     $tablename = "gradecard";   
    if ( isset( $data ) ) {
       
        $cla = $data["cla"];
        if($cla=="all"){
            $count = countrows($conn,"SELECT count(*) FROM $tablename");
        }
        else{
            $count = countrows($conn,"SELECT count(*) FROM $tablename WHERE class='$cla'");
        }
        echo $count;
        
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