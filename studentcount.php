<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
   
        
    
    $tablename = 'institute_class';
        
    $query = "SELECT class_name FROM $tablename";
    $max = countrows($conn,"SELECT count(*) FROM $tablename");
    $result = mysqli_query($conn,$query);
    
        $rows = array();
        echo"{";
        while($r = mysqli_fetch_assoc($result)) {
            $cla = $r["class_name"];
            $cc = countrows($conn,"SELECT count(*) FROM user_student WHERE class='$cla'");
        echo '"'.$r["class_name"].'":'.$cc;
        if(--$max===0)echo "";else echo ",";
        }
        echo"}";
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