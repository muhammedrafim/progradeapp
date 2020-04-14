<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        $usertype = $data["usertype"];
        $userid = $data["userid"];
        if($usertype=="parent"){$tablename = 'user_student';}
        else{$tablename = 'user_'.$usertype;}
        $query = "SELECT * FROM $tablename WHERE id='$userid' ";
        $result = mysqli_query($conn,$query);
        
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
        
            $m = "key";
            echo ''.json_encode($r);
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