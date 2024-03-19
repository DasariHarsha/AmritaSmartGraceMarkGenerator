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
    $sql = "SELECT `roll_num`, `name`, `email`, `ph_no`, `branch`, `batch`, `event_name`, `filename` FROM upload_docs";
    $result = mysqli_query($conn, $sql);
    $adminName = $_SESSION['name'];
	  $adminID = $_SESSION['id'];
    $sql1 = "SELECT filenewname FROM `documents`;";
    $result1 = mysqli_query($conn, $sql1);
    $data2 = array();

    if ($result1->num_rows > 0) {
        while ($row2 = $result1->fetch_assoc()) {
            $data2[] = $row2['filenewname'];
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $app=$_POST['list1'];
      $val=$_POST['val'];
      $sql1="UPDATE `upload_docs` SET `app_rej`='$app', `teacher_name` = '$adminName' WHERE `id`=$val";
      $result4=mysqli_query($conn, $sql1);
    }
	
	}
    // Display the table
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Requests</title>
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
    .text .btn-primary {
      background-color: black;
      border-color: #007bff;
      color: #fff;
      font-weight: bold;
      padding: 10px 20px;
      transition: all 0.2s ease-in-out;
    }
    .btn-tick {
        background-color: white;
        border-color: white;
        font-size: 25px;
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
                      <a class="nav-link active" aria-current="page" href="faculty_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="upload_docs.php">Event Request</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                          Other
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="Faculty_Edit_Profile.html">Edit Profile</a></li>
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
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center mb-4">REQUESTS</h2>
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ROLL NUMBER</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE NUMBER</th>
                    <th>BRANCH</th>
                    <th>BATCH</th>
                    <th>EVENT NAME</th>
                    <th>FILE NAME</th>
                    <th>VIEW DOCS</th>
                    <th>APPROVE/REJECT</th>
                   </tr>
                </thead>
                <tbody>
                <?php
                      $i=0;
                      if (mysqli_num_rows($result) > 0) {
                        // Print the data rows
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          foreach ($row as $value) {
                            echo "<td>" . $value . "</td>";
                          }
                          $ok="uploads/".$data2[$i].'.pdf';
                          $k=$i+1;
                          echo "<td><a href='".$ok."' target='_blank' class='btn btn-primary name='file_id''>VIEW</a></td>
                          <td d-flex flex-row>
                          <div d-flex flex-row>
                          <table>

                          <tr>
                            <form action='#' method='POST'>
                              <input type='hidden' name='val' value='".$k."'>
                              <input type='hidden' name='list1' value='Teacher Approved'>
                              <button type='submit' class='btn btn-tick' id='yes' onclick='alert('Successfully accepted request')''>&#9989</button>
                            </form>
                            <form action='#' method='POST'>
                              <input type='hidden' name='val' value='".$k."'>
                              <input type='hidden' name='list1' value='Teacher Rejected'>
                              <button type='submit' class='btn btn-tick' id='no' onclick='alert('Successfully rejected request')''>&#10060</button>
                            </form>
                            </tr>
                            </table>
                            </div>
                          </td>";
                          echo "</tr>";
                          $i++;
                        }
                      } else {
                        echo "No data found";
                      }
                  ?>
                    </tbody>
               </table>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>