<?php
$uri = "mysqlx://admin:zxcvbnm@localhost:33060?ssl-mode=disabled";
$nodeSession = mysql_xdevapi\getSession( $uri );
include $_SERVER['DOCUMENT_ROOT'].'/prograde/db_connect.php';
//
//$sth = mysqli_query($conn,"SELECT * from institue_info");
//$query = "SELECT * FROM institute_info";
$query = "select item_name, COLUMN_JSON(dynamic_cols) from assets";
$result = mysqli_query($conn,$query);
//
$number = mysqli_num_rows($result);

echo "{";
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    
    $m = $r['item_name'];$v = $r['COLUMN_JSON(dynamic_cols)'];
    echo '"'.$m.'":'.$v;
    if(--$number===0)echo "";else echo ",";
}
//echo '"jaku":"45","pinku":"67",';
echo "}";
//print json_encode($rows);
//echo $result;
?>