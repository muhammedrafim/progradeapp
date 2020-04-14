<?php
include 'db_connect.php';
//
//$sth = mysqli_query($conn,"SELECT * from institue_info");
$query = "SELECT * FROM library_categories ORDER BY category ASC";
$result = mysqli_query($conn,$query);
//
$number = mysqli_num_rows($result);

echo "{";
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    
    $m = $r['category'];
    echo '"'.$m.'":'.json_encode($r);
    if(--$number===0)echo "";else echo ",";
}
//echo '"jaku":"45","pinku":"67",';
echo "}";
//print json_encode($rows);
//echo $result;
?>