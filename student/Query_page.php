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
      $Name1 = $_POST['name'];
      $Email = $_POST['email'];
      $RollNum = $_POST['roll-number'];
      $des=$_POST['comments'];
      $sql = "INSERT INTO `st_queries`(`Name`, `Email`, `RollNum`, `Query`) VALUES ('$Name1','$Email','$RollNum','$des')";
      $result = mysqli_query($conn, $sql);
    }

    // Display the table
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Query Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
      .shadow-box {
          box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
          border-radius: 0.25rem;
          padding: 1rem;
          margin: 1rem auto;
          max-width: 600px;
          margin-left: 200px;
      }

      .query-image {
          height: 400px;
      }

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
  
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="SGMG_Logo.jpg" style="height: 40px; padding-left: 30px;" > <b style="font-size: xx-large;">SGMG</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto" style="padding-right: 50px;">
                <ul class="nav justify-content-end nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="Stud_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="upload_docs.php">Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="stud_grace_mark_list.php">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="stud_doc_status.php">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="grades.php">Grades</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                          Other
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="Stud_Edit_Profile.php">Edit Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../choose3.html">Logout</a></li>
                        </ul>
                    </li>
                  </ul>
            </div>
          </div>
        </div>
    </nav>
    <div class="feel_free">
      <h2 class="heading_1" style="font-weight: bold; text-align: left; margin-left: 200px; margin-top: 15px;"> Feel free to ask your queries 
        <img src="149740.png" style="height: 80px;"></h2>
    </div>
  <div class="shadow-box">
    <form action="#" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="roll-number" class="form-label">Roll Number</label>
          <input type="text" class="form-control" id="roll-number" name="roll-number" placeholder="Enter your roll number" required>
        </div>
        <div class="mb-3">
          <label for="comments" class="form-label">Comments</label>
          <textarea class="form-control" id="comments" name="comments" placeholder="Enter your queries" rows="3"></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" onclick="alert('Success')">Submit</button>
          
        </div>
    </form>
  </div>
  <div>
    <img src="query_symbol.jpg" class="query-image" style="height: 150px;">
  </div>
  </body>
</html>