<?php

include 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {

        $cla = $data["cla"];
        $batch = $data["batch"];
        $tablename = 'timetable';
        $dat = json_encode($data['dat']);
        $query = "SELECT * FROM $tablename WHERE (class='$cla' AND batch='$batch')";
        $result = mysqli_query($conn,$query);
        if (mysqli_fetch_row($result)) {
        //update
            $query2 = "UPDATE $tablename SET data='$dat' WHERE (class='$cla' AND batch='$batch')";
            $conn->query($query2);
            if(($conn->affected_rows)==0){
                print("error");
            }
            else{print("timetable Updated");}
        } else {
        //insert
            $query2 = "INSERT INTO $tablename(class,batch,data) VALUES ('$cla','$batch','$dat')";
            $conn->query($query2);
            if(($conn->affected_rows)==0){
                print("error");
            }
            else{print("timetable Inserted");}
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