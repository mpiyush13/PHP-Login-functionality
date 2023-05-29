
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
     include 'component/navbar.php';
    ?>
    <?php
include 'component/dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $uname = $_POST['username'];
    $password = $_POST['password'];
   

    $sql = "SELECT * FROM `user` WHERE `username` = '$uname'";
    $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
      // output data of each row
    
      while($row = $result->fetch_assoc()) {

        if(password_verify($password, $row["password"]))
        {
            echo '<div class="alert  alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your are successfully Logged in.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          session_start();
          $_SESSION["username"] = $uname;
          header('Location:Home.php');
        }else
        {
            echo '<div class="alert  alert-danger alert-dismissible fade show" role="alert">
           <strong>Error!</strong> Put correct credential!!!!!!!!!.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>';
        }
       
      }
    }else{
        echo '<div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Put correct credential!!!!!!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } 

}
?>

   <div class="container my-3">
    <h2 class="text-center">Login Here</h2>
    <form action="/piyush1/Login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>