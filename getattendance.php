<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["b"];
        
    if ( isset( $data ) ) {
       
        $monthyear = $data["monthyear"];
        $class = $data["class"];
        $batch = $data["batch"];
        $tablename = "attendance".$class.$batch.$monthyear;
        //$tablename = "user_student";

        $query = "CREATE TABLE IF NOT EXISTS $tablename (id VARCHAR(767),class TEXT,batch TEXT,UNIQUE KEY unique_id (id))";
        //$result = mysqli_query($conn,$checktab);
        $query_result = mysqli_query($conn,$query) or die(mysqli_error($conn));
        if ($query_result) {
            //echo 'success';
        } else {
        //echo 'failure' . mysql_error();
        }
        $column_count = mysqli_num_rows(mysqli_query($conn,"describe $tablename"))-3;
        //echo $column_count;
        $sql = "SHOW COLUMNS FROM $tablename";
        $result = mysqli_query($conn,$sql);
        echo "[";
        while($row = mysqli_fetch_array($result)){
            if($row['Field']!="id"&&$row['Field']!="class"&&$row['Field']!="batch"){
                echo '"'.$row['Field'].'"';
            if(--$column_count===0)echo "";else echo ",";
            }
        }
        echo "]";
        //update database
        /*
        $query = "SELECT id,name,photourl FROM $tablename WHERE class='$cla' ORDER BY id ASC  LIMIT $off, $lim";
        $result = mysqli_query($conn,$query);
        $max = countrows($conn,"SELECT count(*) FROM $tablename WHERE class='$cla'");
        if(($max-$off)>$lim)$number = $lim;else $number = ($max - $off);
        echo "{";
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
    
        $m = $r['id'];
        echo '"'.$m.'":'.json_encode($r);
        if(--$number===0)echo "";else echo ",";
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