<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        $class = $data["class"];
        $batchjsontemp = $data["subjectjson"];
        $subjectjson = json_encode($batchjsontemp);
        //$batchjson = '["JavaScript", "ES2015", "JSON"]';
        $tablename = 'institute_class';
        
        //$query = "SELECT * FROM `user_admin` WHERE id='$userid' ";
        $query = "UPDATE $tablename SET subject='$subjectjson' WHERE class_name='$class'";
        $result = mysqli_query($conn,$query);
        
            //$rows = array();
            //while($r = mysqli_fetch_assoc($result)) {
        
            //echo ''.json_encode($r);
            //}
        echo "success";
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