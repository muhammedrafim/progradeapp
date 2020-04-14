<?php
$servername = "localhost";
 $username = "admin";
 $password = "zxcvbnm";
 $dbname = "prograde";
 $ser_key = "kanjw786cneu88734g4gb38yh4";
 
 // Create connection
 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 //echo "Connected successfully";
 ?>