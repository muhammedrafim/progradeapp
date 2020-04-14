<?php
include 'db_connect.php';

$tablename = 'subject_list';
$query = "SELECT subject FROM $tablename ORDER BY subject ASC";
$result = mysqli_query($conn,$query);
//
$number = mysqli_num_rows($result);

echo "[";
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    
    $res = $r["subject"];
    //echo str_replace('\\','',$res);
    echo '"'.$res.'"';
    if(--$number===0)echo "";else echo ",";
}
echo "]";
?>