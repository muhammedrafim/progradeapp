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
        $tablename = "user_student";
        $cla = $data["cla"];
        $batch = $data["batch"];
    
        //update database
        if($batch=="all"){
            $query = "SELECT id,name,batch FROM $tablename WHERE class='$cla' ORDER BY id DESC  LIMIT $off, $lim";
            $result = mysqli_query($conn,$query);
            $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE class='$cla'");
        }
        else{
            $query = "SELECT id,name FROM $tablename WHERE (class='$cla' AND batch='$batch') ORDER BY id DESC  LIMIT $off, $lim";
            $result = mysqli_query($conn,$query);
            $max = countrows($conn,"SELECT count(*) FROM $tablename  WHERE (class='$cla' AND batch='$batch')");
        }
        
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