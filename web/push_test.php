<!DOCTYPE html>
<html lang="en">
<head>
  <title>ProGrade</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<?php
require_once('../db_connect.php');
?>

<body class="h-100">
    
    	
    	<div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
					<!-- Form -->
                	<form class="form-example" action="" method="post">
                		<h1>Bootstrap 4: Align Center</h1>
                		<p class="description">A tutorial on how to align a "form" vertically and horizontally in Bootstrap 4.</p>
                		<!-- Input fields -->
                		<div class="form-group">
                			<label for="username">Username:</label>
                			<input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
                		</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
						</div>
						<button type="submit" class="btn btn-primary btn-customized">Login</button>
                		<!-- End input fields -->
                		<p class="copyright">© Bootstrap 4 "Align Center" tutorial by <a href="https://azmind.com">AZMIND</a>.</p>
                	</form>
					<!-- Form end -->
                </div>
            </div>
        </div>
<div class="col-md-4 col-md-offset-4">
<style>
.vertical-center {
  min-height: 100%;
  min-width:100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
</style>


  <form class="form-horizontal" method="post" id="myform" action="http://localhost/prograde/firebase_push.php">
    <div class="">
        <div class="form-group">
        <h2>Send notification</h2>
        </div>
    </div>
    <!--
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Select class:</label>
      <div class="col-sm-10">          
      <select class="form-control" id="sel1">-->
      <?php
      /*
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
      */
      ?>
        <!--<option>All</option>
        </select>
      </div>
    </div>-->
    <div class="d-flex justify-content-center">
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title:</label>      
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form-group">
            <label class="control-label col-sm-2" for="message">Message:</label>    
            <input type="text" class="form-control" id="message" placeholder="Enter message" name="message">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="form-group">
            <label class="control-label col-sm-2" for="parentemail">Topic:</label>       
            <input type="text" class="form-control" id="topic" placeholder="Enter topic" name="topic">
        </div>
    </div>
    
    
    <div class="d-flex justify-content-center">
    <div class="form-group">        
      <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-warning" id="go">Submit</button>
      
        <!--<button type="submit" class="btn btn-default" id="go">Submit</button>-->
      </div>
      </div>
    </div>

    <div class="d-flex justify-content-center">
  <div class="spinner-border text-warning" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
  </form>
  

</div>


<script>
// this is the id of the submit button
$("#go").click(function() {

var url = "http://localhost/prograde/firebase_push.php"; // the script where you handle the form input.

$.ajax({
       type: "POST",
       url: url,
       data: $("#myform").serialize(), // serializes the form's elements.
       success: function(data)
       {
           alert(data); // show response from the php script.
       }
     });

return false; // avoid to execute the actual submit of the form.
});
</script>

</body>
</html>
