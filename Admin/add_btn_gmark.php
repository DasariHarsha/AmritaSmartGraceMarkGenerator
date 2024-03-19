<?php
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
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $ID1=$_POST['ID'];
      $ID=(int) $ID1;
      $des=$_POST['student-id'];
      $mark=$_POST['marks'];
      $sql = "INSERT INTO `gracemark`(`GraceMarkID`, `Description`, `GraceMark`) VALUES ('$ID','$des','$mark')";
      $result = mysqli_query($conn, $sql);
    }

    // Display the table
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Grace Mark</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
            .navbar {
            height: 100px;
            background-color: #bdcddc;
        }
        .navbar-brand {
        color: black;
        font-weight: bold;
        text-decoration: none;
      }
  </style>
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
                        <a class="nav-link active" aria-current="page" href="calci.php">Grace Mark</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="edit_gmark_list.php">List</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                          Other
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="Admin_Edit_Profile.html">Edit Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../choose3.html">Logout</a></li>
                        </ul>
                    </li>
                  </ul>
            </div>
          </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">ADD GRACE MARK</h5>
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="ID" class="form-label">ID:</label>
                                <input type="text" class="form-control" id="ID" name="ID">
                            </div>
                            <div class="mb-3">
                                <label for="student-id" class="form-label">Description:</label>
                                <input type="text" class="form-control" id="student-id" name="student-id">
                            </div>
                            <div class="mb-3">
                                <label for="marks" class="form-label">Grace Marks:</label>
                                <input type="number" class="form-control" id="marks" min="0" name="marks">
                            </div>
                            <button type="submit" class="btn btn-primary d-block mx-auto" onclick="alert('Success')">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>