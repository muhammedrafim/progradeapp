<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
       
        $tablename = "user_student";
        $class = $data["class"];
        $batch = $data["batch"];

    
        $query = "SELECT id,name FROM $tablename WHERE (class='$class' AND batch='$batch') ORDER BY id ASC";
        $result = mysqli_query($conn,$query);
        $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE (class='$class' AND batch='$batch')");
        
        echo "{";
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
    
        $m = $r['id'];
        echo '"'.$m.'":'.json_encode($r);
        if(--$max===0)echo "";else echo ",";
        }
        echo "}";
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