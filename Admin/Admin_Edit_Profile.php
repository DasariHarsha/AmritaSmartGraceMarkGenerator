<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Connect to database
    $db_host = "localhost";
    $db_user = "root";
    $db_pw = "";
    $db_name = "grace_marks";
    $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    session_start();
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $phone = $_POST['phone'];
    $Email = $_POST['email'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    // Query the database
    $sql = "UPDATE `administrator` SET `EmailID`='$Email',`PhoneNum`='$phone',`Address`='$address',`DOB`='$dob' WHERE adminID = '$id'";
    $result = mysqli_query($conn, $sql);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="SGMG_Logo.jpg" style="height: 75px; padding-left: 30px;" > <b style="font-size: xx-large;">SGMG</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto" style="padding-right: 50px;">
                <ul class="nav justify-content-end nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Students</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" aria-current="page" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">View Requests</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="admin_view_requests.php">Faculty</a></li>
                          <li><a class="dropdown-item" href="admin_stud_request.php">Student</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="calci1.php">Grace Mark</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="edit_gmark_list.php">List</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                          Other
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="Admin_Edit_Profile.php">Edit Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../choose3.html">Logout</a></li>
                        </ul>
                    </li>
                  </ul>
            </div>
          </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div class="card-body">
                <h3 class="card-title text-center mb-4">Edit Your Profile</h3>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control " name='dob'id="dob">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name= "email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name= "address" rows="3"></textarea>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>