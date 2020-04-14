<?php

include 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        /* ... proceed ... */
        
        $type = $data["usertype"];
        $id = $data["userid"];
        $tablename = "user_".$type;
    
        //DELETE ROWS
        $query = "DELETE FROM $tablename WHERE id='$id'";
        $conn->query($query);
        if(($conn->affected_rows)==0){
            print("error");
        }
        else{print("$id Deleted");}
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