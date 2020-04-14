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

        
        $sql = "SELECT $columnname FROM $tablename";
        //$res = mysqli_query($conn,$sql);
        /*
        if ($conn->query($sql) === TRUE) {
            echo "user added";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }*/
        if (mysqli_query($conn,$sql)){
        //my_column exists in my_table
        //echo "column exists";
        $query = "SELECT id,$columnname FROM $tablename WHERE (class='$class' AND batch='$batch') ORDER BY id ASC";
        $result = mysqli_query($conn,$query);
        $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE (class='$class' AND batch='$batch')");
        
        $conn->query($query);
        if(($conn->affected_rows)==0){
            echo "{}";
        }
        else{
            echo "{";
                $r = array();
                while($r = mysqli_fetch_assoc($result)) {
            
                $m = $r['id'];
                echo '"'.$m.'":'.json_encode($r);
                if(--$max===0)echo "";else echo ",";
                }
                echo "}";
            }
        /*
        if ($conn->query($query) === TRUE) {
            echo "user added";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }*/
        
        }
        else{
        echo "{}";
        //my_column doesn't exist in my_table
        }
        /*
        //update database
        $query = "SELECT id,name FROM $tablename WHERE (class='$class' AND batch='$batch') ORDER BY id ASC";
        $result = mysqli_query($conn,$query);
        $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE (class='$class' AND batch='$batch')");
        //if(($max-$off)>$lim)$number = $lim;else $number = ($max - $off);
        //echo"$class,$batch";
        echo "{";
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
    
        $m = $r['id'];
        echo '"'.$m.'":'.json_encode($r);
        if(--$max===0)echo "";else echo ",";
        }
        echo "}";*/
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