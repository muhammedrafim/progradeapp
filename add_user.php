<?php
$table_name = "user_student";
//user variables
$admission_number = $_POST["admission_number"];
//auto
$added_by = $_POST["added_by"];
//
$name = $_POST["name"];
$class = $_POST["class"];
$batch = $_POST["batch"];
$email = $_POST["email"];
$parentname = $_POST["parentname"];
$parentemail = $_POST["parentemail"];
$pwd = generateRandomString();
$sql = "INSERT INTO $table_name (admission_number, added_by, batch, class, email, name, parentname, parentemail, pwd)
VALUES ('$admission_number', '$added_by', '$batch', '$class', '$email', '$name', '$parentname', '$parentemail', '$pwd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

    
    $conn->close();
 ?> 