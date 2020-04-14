<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        
        $table_name = "user_student";
        $id = $data["id"];
        $added_by = $data["added_by"];
        $added_at = "0000"; //Server time
        $name = $data["name"];
        $cla = $data["cla"];
        $batch = $data["batch"];
        $pwd = $data["pwd"];
        $photourl = $data["photourl"];
        $parentname = $data["parentname"];
        $parentemail = $data["parentemail"];
        $parent_pwd = $data["parent_pwd"];
        
        $sql = "INSERT INTO $table_name (id, added_by, added_at, name, class, batch, pwd, photourl, parentname, parentemail, parent_pwd)
VALUES ('$id', '$added_by', '$added_at', '$name', '$cla', '$batch', '$pwd', '$photourl', '$parentname', '$parentemail', '$parent_pwd')";

if ($conn->query($sql) === TRUE) {
    echo "user added";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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