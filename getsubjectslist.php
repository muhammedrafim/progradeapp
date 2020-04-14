<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        
    
    $data = json_decode(file_get_contents('php://input'), true);
        
        
    if ( isset( $data ) ) {
        $tablename = "subject_list";
        $key = $data["key"];
        if($key==$ser_key){//TO PREVENT ACCESS FROM UNAUTHORIZED DEVICE
            
    
        $query = "SELECT * FROM $tablename";
        $result = mysqli_query($conn,$query);
        $number = mysqli_num_rows($result);
        $rows = array();
        echo "[";
        while($r = mysqli_fetch_assoc($result)) {
           echo '"'.$r['subject'].'"'; 
           if(--$number===0)echo "";else echo ",";
        }
        echo "]";
        }
        else{
            echo "Unauthorized access. We all know";
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