<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
       
        $tablename = "attendance".$data["class"].$data["batch"].$data["tablename"];
        $class = $data["class"];
        $batch = $data["batch"];
        $columnname = $data["columnname"];
        $studentid = $data["studentid"];
        $attendance = $data["attendance"];

        
        
        //======== TO GOOGLE ===================
        //create new column if not exists(default null)
        //ALTER TABLE table_name ADD COLUMN IF NOT EXISTS column_name tinyint(1) DEFAULT 0;
        $sql = "INSERT INTO $tablename (id, class, batch, $columnname) VALUES('$studentid', '$class', '$batch', '$attendance') ON DUPLICATE KEY UPDATE $columnname='$attendance'";
        $res = mysqli_query($conn,$sql);
        //insert or update data into new column
        //==========================
        
        if ($conn->query($sql) === TRUE) {
            echo "Attendance updated";
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

function countrows($conn,$querry){
    $count_res = mysqli_query($conn,$querry );
    $count = mysqli_fetch_array($count_res);
    return $count[0];
}
?>