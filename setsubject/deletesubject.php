<?php
include 'db_connect.php';

$tablename = 'subject_list';

//printf("Affected rows (INSERT): %d\n", $conn->affected_rows);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        /* ... proceed ... */
        $id = $data["subject"];
        
    if (empty($id)) {
        echo "Empty fields";
    } else {
        //update database
        $query = "DELETE FROM $tablename WHERE subject = '$id'";
        if(!$conn->query($query)){
            //echo($conn -> error);
            echo "Subject already deleted";
        }
        else{print("$id deleted");}
    }}
    else{
        echo "Application error";
    }  
}
else{
    // Prevent accessing form via URL
    echo "Authentication failure";
}
?>