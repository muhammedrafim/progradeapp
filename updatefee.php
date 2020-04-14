<?php

include 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {

        $id = $data["id"];
        $tablename = 'user_student';
        //$cla = $data["cla"];  
        $inst = 'f'.$data["inst"];
        $val = $data["val"];
        //update database
        $query = "UPDATE $tablename SET $inst='$val' WHERE id='$id'";
        $conn->query($query);
        if(($conn->affected_rows)==0){
            print("error");
        }
        else{print("$id Updated");}
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