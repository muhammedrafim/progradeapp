<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["b"];
        
    if ( isset( $data ) ) {
    $tablename = 'institute_class';
    $inst = 'f'.$data["inst"];    
    $query = "SELECT class_name FROM $tablename";
    $max = countrows($conn,"SELECT count(*) FROM $tablename");
    $result = mysqli_query($conn,$query);
    
        $rows = array();
        echo"{";
        while($r = mysqli_fetch_assoc($result)) {
            $cla = $r["class_name"];
            $cc = countrows($conn,"SELECT count(*) FROM user_student WHERE class='$cla'");
            $pa = countrows($conn,"SELECT count(*) FROM user_student WHERE (class='$cla' AND $inst='true')");
            $ua = $cc-$pa;

        echo '"'.$r["class_name"].'":{"total":'.$cc.', "paid":'.$pa.', "pending":'.$ua.'}';
        if(--$max===0)echo "";else echo ",";
        }
        echo"}";
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