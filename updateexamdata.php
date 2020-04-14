<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        $userid = $data["userid"];
        $tablename = "gradecard_data";
        $columnname = "exam_".$data["examid"];
        $scorejson = json_encode($data["scorejson"]);
        $query = "INSERT INTO $tablename (id,$columnname) VALUES('$userid','$scorejson') ON DUPLICATE KEY UPDATE $columnname='$scorejson'";
        //$query = "UPDATE $tablename SET $columnname='$scorejson' WHERE id='$userid'";
        //$result = mysqli_query($conn,$query);
        if ($conn->query($query)) {
            echo "Success";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
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