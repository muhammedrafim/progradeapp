<?php
include 'db_connect.php';

$tablename = 'institute_class';

//printf("Affected rows (INSERT): %d\n", $conn->affected_rows);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        /* ... proceed ... */
        $id = $data["class"];
        
    if (empty($id)) {
        echo "Empty fields";
    } else {
        //update database
        $query = "INSERT INTO $tablename(class_name) VALUES('$id')";
        if(!$conn->query($query)){
            //echo($conn -> error);
            echo "Class already exists";
        }
        else{print("$id added");}
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