<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'grace_marks');
  if(!$db){
    die("Connection failed due to" . mysqli_connect_error());
  }
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  //Load Composer's autoloader
  require 'vendor/autoload.php';
  function send_password_reset($get_name , $get_email , $token ){
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ganapathigundapaneni.2003@gmail.com';                     //SMTP username
    $mail->Password   = 'dujlwccjovrerpfb';                               //SMTP password
    $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ganapathigundapaneni.2003@gmail.com', $get_name);
    $mail->addAddress($get_email);     //Add a recipient

    $email_template = "
      <h3>You are receiving this email because we received a password reset request for your account.</h3>
      <br/><br/>
      <a href='http://localhost/Smart_Grace_Mark_Generator/student/password-change.php?token=$token&email=$get_email'> Click me </a>";
      $mail->Body = $email_template;
      $mail ->send() ;

  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $email=$_POST['email'];
      $token=md5(rand());
      $query = "SELECT * FROM student WHERE EmailID='$email'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_array($results);
        $get_name = $row[ 'Name' ];
        $get_email = $row[ 'EmailID'];
        $update_token ="UPDATE `student` SET `resettoken`='$token' WHERE EmailID='$email' ";
        $update_token_run = mysqli_query($db, $update_token);

        if ($update_token_run){
          send_password_reset($get_name , $get_email , $token ) ;
        }
        else{
          $_SESSION['status'] = "Something went wrong. #1";
          header("Location: reset_password.php");
          exit (0);
        }
      } else {
        $_SESSION['status']= "No Email Found";
        header(" Location: password-reset .php");
        echo "no mail found";
        exit(0);

        // email found, generate a unique token and store it in the password_resets table
        $token = bin2hex(random_bytes(50)); // generate a random string
        $query = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
        mysqli_query($db, $query);
        // send an email to the user with the password reset link
        $to = $email;
        $subject = "Password Reset";
        $message = "Hi, \n\nYou requested to reset your password. Please click on this link to create a new password: \n\n http://localhost/reset_password.php?token=$token";
        $headers = "From: admin@password-reset-php.com";
        mail($to, $subject, $message, $headers); // use PHP mail function to send the email
        echo "A password reset link has been sent to your email";
      }
    }

    // check if user submitted the new password form
    if (isset($_POST['new_password'])) {
      // get the token and the new password from the form
      $token = $_SESSION['token'];
      $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
      // check if the token exists in the password_resets table
      $query = "SELECT * FROM password_resets WHERE token='$token'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 0) {
        // token not found, display an error message
        echo "Invalid token";
      } else {
        // token found, get the email from the password_resets table and update the password in the users table
        $row = mysqli_fetch_assoc($results);
        $email = $row['email'];
        $query = "UPDATE student SET password='$new_password' WHERE email='$email'";
        mysqli_query($db, $query);
        echo "Your password has been updated";
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
                  
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>