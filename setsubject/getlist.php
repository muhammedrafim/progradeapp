<?php
include 'db_connect.php';

$tablename = 'institute_class';
$query = "SELECT class_name,subject FROM $tablename ORDER BY pkey DESC";
$result = mysqli_query($conn,$query);
//
$number = mysqli_num_rows($result);

echo "{";
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    
    $m = $r['class_name'];
    $res = '"'.$m.'":'.json_encode($r);
    //echo str_replace('\\','',$res);
    echo $res;
    if(--$number===0)echo "";else echo ",";
}
echo "}";
?>