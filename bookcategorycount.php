<?php
include 'db_connect.php';
$count = countrows($conn,"SELECT count(*) FROM library_categories");
echo $count;
function countrows($conn,$querry){
    $count_res = mysqli_query($conn,$querry );
    $count = mysqli_fetch_array($count_res);
    return $count[0];
}
?>