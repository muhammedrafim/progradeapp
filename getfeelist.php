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
        $inst = 'f'.$data["inst"];
        $filt = $data["filt"];
        if($filt=="All"){
            $query = "SELECT id,name,$inst FROM $tablename WHERE class='$cla' ORDER BY id ASC  LIMIT $off, $lim";
            $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE class='$cla'");
        } 
        else if($filt=="Paid"){
            $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE (class='$cla' AND $inst='true')");
            $query = "SELECT id,name,$inst FROM $tablename WHERE (class='$cla' AND $inst='true') ORDER BY id ASC  LIMIT $off, $lim";
        } 
        else if($filt=="Pending"){
            $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE (class='$cla' AND ($inst IS NULL OR $inst='false'))");
            $query = "SELECT id,name,$inst FROM $tablename WHERE (class='$cla' AND ($inst IS NULL OR $inst='false')) ORDER BY id ASC  LIMIT $off, $lim";
        }  
    
        //update database
        
        $result = mysqli_query($conn,$query);
        
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