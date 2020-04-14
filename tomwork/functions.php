<?php

function getlist($conn,$tablename,$off,$lim,$params,$filter){
    $query = "SELECT $filter FROM $tablename  $params LIMIT $off, $lim";
    
    $result = mysqli_query($conn,$query);
    $max = countrows($conn,"SELECT count(*) FROM $tablename");
    if(($max-$off)>$lim)$number = $lim;else $number = ($max - $off);
    echo "{";
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
    
        $m = $r['id'];
        echo '"'.$m.'":'.json_encode($r);
        if(--$number===0)echo "";else echo ",";
    }
    echo "}";
}
function getcount($conn,$tablename){
    $max = countrows($conn,"SELECT count(*) FROM $tablename");
    echo $max;
}
function getitem($conn,$tablename,$id){
        $query = "SELECT * FROM $tablename WHERE id='$id' ";
        $result = mysqli_query($conn,$query);
        
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
        
            $m = "key";
            echo ''.json_encode($r);
            }
}
function create($conn,$tablename,$params){
    
    $query = "CREATE TABLE IF NOT EXISTS $tablename (".$params.")";
    
    if ($conn->query($query)) {
        echo "Success";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
function addcolumn($conn,$tablename,$params){
    
    $query = "ALTER TABLE $tablename ADD COLUMN IF NOT EXISTS $params";
    
    if ($conn->query($query)) {
        echo "Success";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
function insert($conn,$tablename,$params){
    
    $query = "INSERT INTO $tablename $params";
    
    if ($conn->query($query)) {
        echo "Success";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
function replace($conn,$tablename,$params){
    
    $query = "REPLACE INTO $tablename $params";
    
    if ($conn->query($query)) {
        echo "Success";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
function delete($conn,$tablename,$params){
    //$query = "DELETE FROM $tablename WHERE id='$id'";
    $query = "DELETE FROM $tablename WHERE $params";
    
    if ($conn->query($query)) {
        echo "Success";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
function countrows($conn,$querry){
    $count_res = mysqli_query($conn,$querry );
    $count = mysqli_fetch_array($count_res);
    return $count[0];
}

?>