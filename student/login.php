<?php
  $login = false;
  $err = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "grace_marks";

    $conn = mysqli_connect($server, $username, $password, $database);
    
    if(!$conn){
        die("Connection failed due to" . mysqli_connect_error());
    }

    $collegeid = $_POST['College_Id']; 
    $StudentPassword = $_POST['password'];
    
    $log = "SELECT * from `Student` WHERE RollNum = '$collegeid' AND Password = '$StudentPassword';";
    
    $result = mysqli_query($conn, $log);

    $num = mysqli_num_rows($result);

    if($num == 1){
      $login = true;
	  $fetchAdminName = mysqli_query($conn, "SELECT Name FROM `Student` WHERE RollNum = '$collegeid';");

      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = mysqli_fetch_assoc($fetchAdminName)['Name'];
      $_SESSION['id'] = $collegeid;
      header("location: Stud_dashboard.php");
    }
    else{
      $err = true;
    } 
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
        .login-btn {
        background-color: #007bff;
        border-color: #007bff;
        transition: all 0.3s ease-in-out;
        }

        .login-btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        }
  </style>
  <body>
    <?php
        if($err == true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid password or name.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card shadow-lg" style="width: 400px;">
          <div class="card-header text-black text-center">
            <h3 class="mb-0">Login</h3>
          </div>
          <div class="card-body">
            <form action="#" method="POST">
              <div class="form-group position-relative mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control rounded-pill" placeholder="Enter your username" name="College_Id">
                <i class="fas fa-user position-absolute text-primary" style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
              </div>
              <div class="form-group position-relative mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control rounded-pill" placeholder="Enter your password" name="password">
                <i class="fas fa-lock position-absolute text-primary" style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
              </div>
              <div class="form-group mb-4">
                <button type="submit" class="btn btn-primary btn-block rounded-pill py-2 login-btn">Login</button>
            </div>
            </form>
          </div>
          <div class="card-footer text-center" style="background: #f9f9f9;">
            <p class="mb-0">Forgot Password? <a href="forgot.php" target="_blank" class="text-primary">Reset</a></p>
          </div>
        </div>
      </div>
  </body>
</html>