<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        
        $table_name = "user_admin";
        $id = $data["id"];
        $added_by = $data["added_by"];
        $added_at = "0000"; //Server time
        $name = $data["name"];
        $email = $data["email"];
        $pwd = $data["pwd"];
        $p1 = $data["p1"];$p2 = $data["p2"];$p3 = $data["p3"];$p4 = $data["p4"];$p5 = $data["p5"];$p6 = $data["p6"];$p7 = $data["p7"];$p8 = $data["p8"];$p9 = $data["p9"];$p10 = $data["p10"];$p11 = $data["p11"];$p12 = $data["p12"];$p13 = $data["p13"];$p14 = $data["p14"];$p15 = $data["p15"];$p16 = $data["p16"];$p17 = $data["p17"];$p18 = $data["p18"];
        $sql = "INSERT INTO $table_name (id, added_at, added_by, email, name, pwd, p1, p2, p3, p4, p5 , p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18)
VALUES ('$id', '$added_at', '$added_by', '$email', '$name', '$pwd', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8', '$p9', '$p10', '$p11', '$p12', '$p13', '$p14', '$p15', '$p16', '$p17', '$p18')";

if ($conn->query($sql) === TRUE) {
    echo "user added";
} else {
    echo "User already exists";
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