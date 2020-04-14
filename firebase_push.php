<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    if ( isset( $_POST["title"] ) ) {
        /* ... proceed ... */
        
        $title = $_POST["title"];
        $message = $_POST["message"];
        $topic = $_POST["topic"];
    if (empty($title)||empty($message)) {
        echo "Empty fields";
    } else {
        push($title,$message,$topic);
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


// functions 
function push($title,$message,$topic){
//$message = generateRandomString(6);
$path_to_fcm = "https://fcm.googleapis.com/fcm/send";
$server_key = "AAAAvxQ1LGA:APA91bFD2sqIS-W0-aJgtEZ_yTxLgmGkGCKPfchRJqhmcWcaBFgt2LZGt9_GxO-gNlIg68NUz6quD_Xh4nl6FczQ2y8gSQoCJHjNaQ5gvIIWiSUGQX-jJIbSEMa1kt6DksAIHzPsMpJr";

$headers = array(
    'Authorization:key=' .$server_key,
    'Content-Type:application/json'
    );
    
    
    $fields = array('to'=>'/topics/'.$topic,'notification'=>array('title'=>$title,'body'=>$message));
    
    $payload = json_encode($fields);
    
    $curl_session = curl_init();
    curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
    curl_setopt($curl_session, CURLOPT_POST, true);
    curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
    curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
    
    $result = curl_exec($curl_session);
    echo $result;
    if ($result === FALSE) {
        die('Problem occurred: ' . curl_error($ch));
    }
    
    curl_close($curl_session);
}

    function generateRandomString($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
