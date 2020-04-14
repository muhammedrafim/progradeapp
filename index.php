<!DOTYPE html>
<html>
<head></head>
<body>
Access Denied

 <?php
 include 'db_connect.php';
 //echo $conn

 // sql to create table
$sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
//
$table_name = "user_student";
//user variables
$admission_number = '525252';
$added_by = 'prograde';
$name = 'moran';
$class = '+1 SC';
$batch = 'A';
$email = 'jose@gmail.com';
$parentname = 'jos=jo';
$parentemail = 'ram@hotmail.com';
$pwd = 'lok';
$sql = "INSERT INTO $table_name (admission_number, added_by, batch, class, email, name, parentname, parentemail, pwd)
VALUES ('$admission_number', '$added_by', '$batch', '$class', '$email', '$name', '$parentname', '$parentemail', '$pwd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


    
    $conn->close();
 ?> 
</body>
</html>