<?php

include 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    if ( isset( $_POST["key"] ) ) {
        /* ... proceed ... */
        
        $key = $_POST["key"];
        
    if (empty($key)) {
        echo "Empty fields";
    } else {
        //update database
        $query = "DELETE FROM library_categories WHERE category='$key'";
        $conn->query($query);
        if(($conn->affected_rows)==0){
            print("error");
        }
        else{print("$key Deleted");}
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