<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
   
        
    
        //get counts
        $admincount = countrows($conn,"SELECT count(*) FROM user_admin");
        $teachercount = countrows($conn,"SELECT count(*) FROM user_teacher");
        $studentcount = countrows($conn,"SELECT count(*) FROM user_student");
        
        echo "{";
        echo'"admin":'.$admincount.','.'"teacher":'.$teachercount.','.'"student":'.$studentcount;
        echo "}";
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