<?php

include 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    if ( isset( $_POST["key"] ) ) {
        /* ... proceed ... */
        $val = $_POST["val"];
        $key = $_POST["key"];
        
    if (empty($key)||empty($val)) {
        echo "Empty fields";
    } else {
        //update database
        $query = "UPDATE timetable_sessions SET session='$val' WHERE session='$key'";
        $conn->query($query);
        if(($conn->affected_rows)==0){
            print("error");
        }
        else{print("$key Updated");}
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