<?php

include $_SERVER['DOCUMENT_ROOT'].'/prograde/db_connect.php';
include 'functions.php';

/*
$query = "CREATE TABLE IF NOT EXISTS $tablename (id VARCHAR(767),class TEXT,batch TEXT,UNIQUE KEY unique_id (id))"
$query = "SELECT * FROM $tablename ORDER BY date DESC LIMIT $off, $lim";
$count = countrows($conn,"SELECT count(*) FROM $tablename");
$sql = "ALTER TABLE $tablename ADD COLUMN IF NOT EXISTS $columnname JSON DEFAULT NULL";
$query = "DELETE FROM $tablename WHERE id='$id'";
$query2 = "UPDATE $tablename SET data='$dat' WHERE (class='$cla' AND batch='$batch')";
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
       
    if ( isset( $data ) ) {
       
        $key = $data["key"];
        if($key==$ser_key){//TO PREVENT ACCESS FROM UNAUTHORIZED DEVICE
            $q = $data["q"];//primary query
            if($q=="getlist"){
                getlist($conn,$data["table"],$data["offset"],$data["limit"],$data["params"],$data["filter"]);
            }
            elseif($q=="getitem"){
                getitem($conn,$data["table"],$data["id"]);
            }
            elseif($q=="getcount"){
                getcount($conn,$data["table"]);
            }
            elseif($q=="create"){
                create($conn,$data["table"],$data["params"]);
            }
            elseif($q=="insert"){
                insert($conn,$data["table"],$data["params"]);
            }
            elseif($q=="replace"){
                replace($conn,$data["table"],$data["params"]);
            }
            elseif($q=="delete"){
                delete($conn,$data["table"],$data["params"]);
            }
            elseif($q=="addcolumn"){
                addcolumn($conn,$data["table"],$data["params"]);
            }

            
        }
        else{ echo "access denied";}
    
            
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