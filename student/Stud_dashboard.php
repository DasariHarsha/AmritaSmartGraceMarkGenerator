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
    // Query the database
    $sql = "SELECT RollNum, DOB, Branch, Batch, Degree FROM student WHERE RollNum='$id'";
    $result = mysqli_query($conn, $sql);
    $sql1 = "SELECT EmailID, PhoneNum, Address FROM student WHERE RollNum='$id'";
    $result1 = mysqli_query($conn, $sql1);
    // Display the table
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="timer.js"></script>
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
  <body onload="startTimer()">
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
                        <a class="nav-link active" aria-current="page" href="stud_doc_status.php">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="stud_grace_mark_list.php">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="grades.php">Grades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Statistics.php">Statistics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="Query_page.php">Query</a>
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
    <div class="dashboard_txt">
        <h3 class="heading_1" style="font-weight: bold; text-align: left; margin-left: 50px; margin-top: 30px;"> Welcome : <?php echo $name; ?></h3>
    </div><br><hr>
    <div style="padding-top: 25px;">
        <h3><img src="https://cdn.pixabay.com/photo/2013/07/13/13/38/man-161282_640.png" style="width: 30px; margin-left: 50px;"> <b> Student Details </b> </h3>
    </div>
    <table class="table table-bordered table-striped" style="width: 80%; margin-left: auto; margin-right: auto; margin-top: 35px;">
        <thead class="table-dark">
          <tr>
            <th><img src="588a64e0d06f6719692a2d10.png" style="width: 27px; margin-right: 8px;">ROLL NUMBER</th>
            <th><img src="https://icon-library.com/images/calendar-icon-white-png/calendar-icon-white-png-18.jpg" style="width: 27px; margin-right: 8px;">DOB</th>
            <th><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRznMwIXp7FccA8WPvo9eAJb_itVUXXQyutPQ&usqp=CAU" style="width: 27px; margin-right: 8px;">BRANCH</th>
            <th><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89W5NGavpWaWJxg2L-POyL8Tr_GlutzoTY9G7d7Kp&s" style="width: 27px; margin-right: 8px;">SECTION</th>
            <th><img src="https://www.citypng.com/public/uploads/preview/white-notification-bell-icon-transparent-background-11638985030nycenfyruw.png" style="width: 27px; margin-right: 8px;">STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (mysqli_num_rows($result) > 0) {
              // Print the data rows
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                  echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
              }
              echo "</table>";
            } else {
              echo "No data found";
            }
          ?>
        </tbody>
    </table>
    <div style="padding-top: 35px;">
        <h3><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWXvtkMZe1wpdmrdOyyci4z5mAr3NpyLI65g&usqp=CAU" style="width: 30px; margin-left: 50px;"> <b> Contact Details </b> </h3>
    </div>
    <table class="table table-bordered table-striped" style="width: 80%; margin-left: auto; margin-right: auto; margin-top: 35px;">
        <thead class="table-dark">
          <tr>
            <th><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSF9_A6TUm53av7Ux7INdLj8AC--lYuFZp6eA&usqp=CAU" style="width: 28px; margin-right: 8px;">EMAIL</th>
            <th><img src="data:image/png;base64,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" style="width: 27px; margin-right: 8px;">PHONE NUMBER</th>
            <th><img src="data:image/png;base64,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" style="width: 27px; margin-right: 8px;">ADDRESS</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (mysqli_num_rows($result1) > 0) {
              // Print the data rows
              while ($row = mysqli_fetch_assoc($result1)) {
                echo "<tr>";
                foreach ($row as $value) {
                  echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
              }
              echo "</table>";
            } else {
              echo "No data found";
            }
          ?>
        </tbody>
      </table>
  </body>
</html>