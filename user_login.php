<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        $usertype = $data["usertype"];
        $userid = $data["userid"];
        $pwd = $data["pwd"];
        if($usertype=="parent"){$tablename = 'user_student';}
        else{$tablename = 'user_'.$usertype;}
        
        
        $query = "SELECT * FROM $tablename WHERE id='$userid' ";
        $result = mysqli_query($conn,$query);
        
            
            while($r = mysqli_fetch_assoc($result)) {
        
            $m = "key";
            echo ''.json_encode($r);
            /* 
            if($userid==$r['id']){
                if(($usertype=="student" || $usertype=="teacher" || $usertype=="admin" || $usertype=="super_admin") 
                && $pwd==$r['pwd']){
                    echo "0";
                }
                else if($usertype=="parent" && $pwd==$r['parent_pwd']){
                    echo "0";
                }
                else{
                    echo "Incorrect password";
                }
            }
            else echo "User doesn't exists";*/
            }
            
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