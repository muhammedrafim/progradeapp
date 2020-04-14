<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $data = json_decode(file_get_contents('php://input'), true);
        
    if ( isset( $data ) ) {
        
        
        $table_name = "gradecard";
        $id = uniqid();
        $exam = $data["exam"];//weekly,monthly,quarterly,terminal,special
        $cla = $data["cla"];
        $examdate = $data["examdate"];
        $type = $data["type"];//0- all, 1- individual
        $maxscore = json_encode($data["maxscore"]);
        $pub = 0;//0- unpublished,1-published
        
        $sql = "INSERT INTO $table_name (id, exam, class, examdate, type, maxscore, pub)
VALUES ('$id', '$exam', '$cla', '$examdate', $type, '$maxscore', $pub)";

if ($conn->query($sql)) {
        echo "exam added";
        $tablename = "gradecard_data";
        $columnname = "exam_".$id;
        $sql = "ALTER TABLE $tablename ADD COLUMN IF NOT EXISTS $columnname JSON DEFAULT NULL";
        $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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