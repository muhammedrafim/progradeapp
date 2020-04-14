<?php
include 'db_connect.php';



//printf("Affected rows (INSERT): %d\n", $conn->affected_rows);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    if ( isset( $_POST["key"] ) ) {
        /* ... proceed ... */
        $key = $_POST["key"];
        
    if (empty($key)) {
        echo "Empty fields";
    } else {
        //update database
        $query = "INSERT IGNORE INTO timetable_sessions
        set session='$key'";
        $conn->query($query);
        if(($conn->affected_rows)==0){
            print("value already exists");
        }
        else{print("$key Inserted");}
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