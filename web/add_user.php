<!DOCTYPE html>
<html lang="en">
<head>
  <title>ProGrade</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once('../db_connect.php');
?>
<div class="container">
  <h2>Add User</h2>
  <form class="form-horizontal" action="http://localhost/add_user.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="admission_number">Admission number:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="admission_number" placeholder="Enter admission number" name="admission_number">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Select class:</label>
      <div class="col-sm-10">          
      <select class="form-control" id="sel1">
      <?php
      $sql = "SELECT class_name FROM institute_class";
      $result = $conn->query($sql);
      //echo $result;
      
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<option> " . $row["class_name"]."</option>";
          }
      } else {
          echo "0 results";
      }
      ?>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="parentname">Parent name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="parentname" placeholder="Enter parent name" name="parentname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="parentemail">Parent's email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="parentemail" placeholder="Enter parent's email" name="parentemail">
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
