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

<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="signup.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Reset Password</h1>
    </div>
    <div class="form">
        <form action="#" method="POST">
            <input type="email" name="email" placeholder="Email" class="input" required>
            <input type="password" name="password" placeholder="Password" class="input" required>
            <input type="password" name="confirm_password" placeholder="Confirm password" class="input" required>
            <?php
                if($err == true){
                    echo '<p>Passwords didnot match</p>';
                }
            ?>
            <input type="submit" class="button">
        </form>
    </div>
</div>

</body>
</html>