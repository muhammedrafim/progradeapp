<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        $userid = $data["userid"];
        $tablename = "attendance".$data["class"].$data["batch"].$data["monthyear"];;
        //$class = $data["class"];
        //$batch = $data["batch"];
        $sql = "SELECT * FROM $tablename WHERE id='$userid' ";
        $result = mysqli_query($conn,$sql);
        
        if ($conn->query($sql)) {
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
        
            $m = "key";
            echo ''.json_encode($r);
            }
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo"{}";
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