<!doctype html>
<html lang="en">
<head>
    <title>Class Reports</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="graph.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
                        <a class="nav-link active" aria-current="page" href="faculty_view_requests.php">View Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="upload_docs.php">Event Request</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                          Other
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="Faculty_Edit_Profile.php">Edit Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="Graphs.php">Graphs</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../choose3.html">Logout</a></li>
                        </ul>
                    </li>
                  </ul>
            </div>
          </div>
        </div>
    </nav>
    <div class="bar12">
        <canvas  id="sectionReportChart" width="" height=""></canvas>
    </div>
    <div class="bar12">
        <canvas id="courseReportChart" width="" height=""></canvas>
    </div>
    <div class="pie10 justify-content-right" >
        <h1>Without Grace Mark</h1>
        <canvas id="failPercentageChart" ></canvas>
    </div>
    <div class="pie10 justify-content-right" >
        <h1>With Grace Mark</h1>
        <canvas id="afterfailPercentageChart"></canvas>
    </div>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grace_marks";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve section-wise data from marks table
    $sql = "SELECT Section, SUM(Total) as total_marks FROM course_mark GROUP BY Section";
    $sectionResult = $conn->query($sql);

    // Prepare data for section-wise chart
    $sectionLabels = array();
    $sectionData = array();
    $sectionBackgroundColor = array();
    $sectionBorderColor = array();

    if ($sectionResult->num_rows > 0) {
        while ($row = $sectionResult->fetch_assoc()) {
            $sectionLabels[] = $row['Section'];
            $sectionData[] = $row['total_marks'];
            $sectionBackgroundColor[] = 'rgba(75, 192, 192, 0.2)';
            $sectionBorderColor[] = 'rgba(75, 192, 192, 1)';
        }
    }

    // Retrieve course-wise and section-wise data from marks table
    $courseSql = "SELECT Section, CourseID, SUM(Total) as total_marks FROM course_mark GROUP BY Section, CourseID";
    $courseResult = $conn->query($courseSql);

    // Prepare data for course-wise and section-wise chart
    $courseLabels = array();
    $courseData = array();
    $courseBackgroundColor = array();
    $courseBorderColor = array();

    if ($courseResult->num_rows > 0) {
        while ($row = $courseResult->fetch_assoc()) {
            $courseLabels[] = $row['Section'] . " - " . $row['CourseID'];
            $courseData[] = $row['total_marks'];
            $courseBackgroundColor[] = 'rgba(255, 99, 132, 0.2)';
            $courseBorderColor[] = 'rgba(255, 99, 132, 1)';
        }
    }
    // Retrieve fail count from course_marks table
    $failSql = "SELECT COUNT(*) as fail_count FROM course_mark WHERE Grade = 'F'";
    $failResult = $conn->query($failSql);

    // Retrieve pass count from course_marks table
    $passSql = "SELECT COUNT(*) as pass_count FROM course_mark WHERE Grade != 'F'";
    $passResult = $conn->query($passSql);
    $fail=$failResult->fetch_assoc()['fail_count'];
    $pass=$passResult->fetch_assoc()['pass_count'];
    // Get the total count of records in course_marks table
    $totalCount =  $pass+$fail;
    // Calculate fail percentage
    $failPercentage = ($fail/$totalCount) * 100;
    $passPercentage = 100 - $failPercentage;

    //After
    $afterfailSql = "SELECT COUNT(*) as fail_count FROM course_mark WHERE Final_Grade = 'F'";
    $afterfailResult = $conn->query($afterfailSql);

    // Retrieve pass count from course_marks table
    $afterpassSql = "SELECT COUNT(*) as pass_count FROM course_mark WHERE Final_Grade != 'F'";
    $afterpassResult = $conn->query($passSql);
    $afterfail=$afterfailResult->fetch_assoc()['fail_count'];
    $afterpass=$afterpassResult->fetch_assoc()['pass_count'];
    // Get the total count of records in course_marks table
    $aftertotalCount =  $afterpass+$afterfail;
    // Calculate fail percentage
    $afterfailPercentage = ($afterfail/$aftertotalCount) * 100;
    $afterpassPercentage = 100 - $afterfailPercentage;

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // Generate data for the section-wise chart
        var sectionData = {
            labels: <?php echo json_encode($sectionLabels); ?>,
            datasets: [
                {
                    label: "Total Marks",
                    data: <?php echo json_encode($sectionData); ?>,
                    backgroundColor: <?php echo json_encode($sectionBackgroundColor); ?>,
                    borderColor: <?php echo json_encode($sectionBorderColor); ?>,
                    borderWidth: 1
                }
            ]
        };

        // Create a section-wise chart on the canvas element
        var sectionCtx = document.getElementById('sectionReportChart').getContext('2d');
        var sectionReportChart = new Chart(sectionCtx, {
            type: 'bar',
            data: sectionData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Generate data for the course-wise and section-wise chart
        var courseData = {
            labels: <?php echo json_encode($courseLabels); ?>,
            datasets: [
                {
                    label: "Total Marks",
                    data: <?php echo json_encode($courseData); ?>,
                    backgroundColor: <?php echo json_encode($courseBackgroundColor); ?>,
                    borderColor: <?php echo json_encode($courseBorderColor); ?>,
                    borderWidth: 1
                }
            ]
        };

        // Create a course-wise and section-wise chart on the canvas element
        var courseCtx = document.getElementById('courseReportChart').getContext('2d');
        var courseReportChart = new Chart(courseCtx, {
            type: 'bar',
            data: courseData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var failPercentageData = {
            labels: ["Fail", "Pass"],
            datasets: [
                {
                    label: "Fail Percentage",
                    data: [<?php echo $failPercentage; ?>, <?php echo $passPercentage; ?>],
                    backgroundColor: ['red', 'green'],
                    borderWidth: 1
                }
            ]
        };

        // Create a fail percentage pie chart on the canvas element
        var failPercentageCtx = document.getElementById('failPercentageChart').getContext('2d');
        var failPercentageChart = new Chart(failPercentageCtx, {
            type: 'pie',
            data: failPercentageData,
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });

        var afterfailPercentageData = {
            labels: ["Fail", "Pass"],
            datasets: [
                {
                    label: "Fail Percentage",
                    data: [<?php echo $afterfailPercentage; ?>, <?php echo $afterpassPercentage; ?>],
                    backgroundColor: ['red', 'green'],
                    borderWidth: 1
                }
            ]
        };

        // Create a fail percentage pie chart on the canvas element
        var afterfailPercentageCtx = document.getElementById('afterfailPercentageChart').getContext('2d');
        var afterfailPercentageChart = new Chart(afterfailPercentageCtx, {
            type: 'pie',
            data: afterfailPercentageData,
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });
    </script>
    <button class="btn btn-primary" onclick="window.print()">Download Report</button>
</body>
</html>
