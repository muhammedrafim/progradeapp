<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["b"];
        
    if ( isset( $data ) ) {
       
        $off = $data["a"];
        $lim = $data["b"];
        $tablename = "user_teacher";
    
        //update database
        $query = "SELECT id,name FROM $tablename ORDER BY id ASC  LIMIT $off, $lim";
        $result = mysqli_query($conn,$query);
        $max = countrows($conn,"SELECT count(*) FROM $tablename");
        if(($max-$off)>$lim)$number = $lim;else $number = ($max - $off);
        echo "{";
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
    
        $m = $r['id'];
        echo '"'.$m.'":'.json_encode($r);
        if(--$number===0)echo "";else echo ",";
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