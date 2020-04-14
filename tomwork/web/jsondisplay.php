<!DOCTYPE html>
<head>
<link rel="stylesheet" href="http://localhost/prograde/tomwork/lib/jsonview/jsonview.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<script src="http://localhost/prograde/tomwork/lib/jsonview/jsonview.js"></script>
</head>
<body>
<div class="root"></div>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/prograde/db_connect.php';
//
//$sth = mysqli_query($conn,"SELECT * from institue_info");
//$query = "SELECT * FROM institute_info";
$query = "select item_name, COLUMN_JSON(dynamic_cols) from assets";
$result = mysqli_query($conn,$query);
//
$number = mysqli_num_rows($result);

$str="{";
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    
    $m = $r['item_name'];$v = $r['COLUMN_JSON(dynamic_cols)'];
    $str = $str.'"'.$m.'":'.$v;
    if(--$number===0){
        echo "";}
    else{$str = $str.",";}
}
$str = $str."}";
echo "<br>".$str;
echo"<script>let data = '".$str."';let target = '.root';jsonView.format(data, target);</script>"
//print json_encode($rows);
//echo $result;
?>
</body>
</html>