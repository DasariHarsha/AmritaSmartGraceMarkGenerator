<?php
    $err = false;
    $db = mysqli_connect('localhost', 'root', '', 'grace_marks');
    if(!$db){
      die("Connection failed due to" . mysqli_connect_error());
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        $id = $_SESSION['id'];
        $mail=$_POST['email'];
        $pa1=$_POST['password'];
        $pa2=$_POST['confirm_password'];
        if ($pa1==$pa2){
            $sql = "UPDATE `student` SET `Password`='$pa2' WHERE EmailID = '$mail'";
            $result = mysqli_query($db, $sql);
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
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
        .form-box {
        box-shadow: 0px 0px 20px rgba(0,0,0,0.1);
        padding: 20px;
      }
      .form-img {
        width: 100%;
        max-width: 300px;
        margin-bottom: 20px;
      }
  </style>
  <body>
  <?php
        if($err == true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Passwords did not match
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="form-box">
              <img src="https://i.pinimg.com/564x/cd/51/b7/cd51b7b03e8a309245c2e1b1378e7313.jpg" class="form-img" alt="logo">
              <h1 class="text-center mb-4">Forgot your Password?</h1>
              <form action="#" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" aria-describedby="emailHelp" required>
                  <div id="emailHelp" class="form-text">We'll send you a link to reset your password.</div>
                </div>
                <div class="mb-3">
                  <label for="new" class="form-label">New Password</label>
                  <input type="password" class="form-control" id="new" name="password" placeholder="Enter New Password" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="con" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="con" name="confirm_password" placeholder="Re-Enter Above Password" aria-describedby="emailHelp" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" onsubmit="alert('Password Has been changed Successfully')">Reset Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>