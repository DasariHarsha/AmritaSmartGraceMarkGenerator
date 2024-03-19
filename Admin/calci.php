<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="calci.css">
    <script src="calci3.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
    background-color: #4CAF50;
    color: white;
    }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
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

// Query the database
$sql = "SELECT CourseID, Internals, Marks, Total, Grade FROM course_mark WHERE RollNum='CB.EN.U4CSE20412'";
$result = mysqli_query($conn, $sql);

// Display the table
if (mysqli_num_rows($result) > 0) {
  echo "<table id=\"data-table\">";
  echo "<tr>";
  // Print the column names as table headers
  while ($field = mysqli_fetch_field($result)) {
    echo "<th>" . $field->name . "</th>";
  }
  echo "</tr>";
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the list of new values from the POST request
  $list = json_decode($_POST["list1"],true);
  $result=['19CSE201','19CSE213','19CSE302','19CSE312','19CSE313'];
  // Loop through the list and update each row
  // $sql1 = "UPDATE `course_mark` SET `Final_Grade`='O' WHERE RollNum = 'CB.EN.U4CSE18224' and CourseID='15CSE201'";
  //   $result1 = mysqli_query($conn, $sql1);
  for ($i = 0; $i < 5; $i++) {
    // Get the id and email from the list
    $element1 = $list[$i];
    $element2 = $result[$i];
    // Prepare and execute the update query
    $sql1 = "UPDATE `course_mark` SET `Final_Grade`='$element1' WHERE RollNum = 'CB.EN.U4CSE20412' and CourseID='$element2'";
    $result1 = mysqli_query($conn, $sql1);
  }
}
?>
<div class="btn-group m-2">
<button class="btn btn-primary m-2" type="submit" onclick="newGrade()">Calculate</button> 
<form action="#" method="POST" id="myForm">
  <input type="hidden" name="list1" value="25">
  <button class="btn btn-primary m-2" type="submit">Update</button>
</form>
</div>
<!-- <button class="btn btn-primary m-2" type="submit" onclick="newGrade()">Calculate</button>  -->
</body>
</html>
