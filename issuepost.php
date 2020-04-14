<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        
        $table_name = "reportissues";
        $user = $data["user"];
        $date = round(microtime(true) * 1000);
        $issue = $data["issue"];
        $sql = "INSERT INTO $table_name (issue, user, date) VALUES ('$issue', '$user', '$date')";

        if ($conn->query($sql)) {echo "Report issued";} else {echo "Error: " . $sql . "<br>" . $conn->error;}
            
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