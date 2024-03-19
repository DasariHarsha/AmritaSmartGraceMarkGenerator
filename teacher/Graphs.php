<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="calci.css">
    <script src="calci3.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Class Reports</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="sectionReportChart"></canvas>
    <canvas id="courseReportChart"></canvas>
    <canvas id="gradeReportChart" width="40" height="40"></canvas>
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
        $isFirstSection = true;  // Flag to check if it's the first section
        while ($row = $sectionResult->fetch_assoc()) {
            if ($isFirstSection) {
                $isFirstSection = false;
                continue;  // Skip the first section
            }
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
        $isFirstSection = 0;  // Flag to check if it's the first section
        while ($row = $courseResult->fetch_assoc()) {
            $isFirstSection+=1;
            if ($isFirstSection<=5) {
                continue;  // Skip the first section
            }
            $courseLabels[] = $row['Section'] . " - " . $row['CourseID'];
            $courseData[] = $row['total_marks'];
            $courseBackgroundColor[] = 'rgba(255, 99, 132, 0.2)';
            $courseBorderColor[] = 'rgba(255, 99, 132, 1)';
        }
    }
    // Retrieve fail percentage data from marks table
    $gradeSql = "SELECT Grade, COUNT(*) as fail_count FROM course_mark WHERE Grade = 'F' GROUP BY Grade";
    $gradeResult = $conn->query($gradeSql);

    // Prepare data for grade pie chart
    $gradeLabels = array();
    $gradeData = array();
    $gradeBackgroundColor = array();
    $gradeBorderColor = array();

    if ($gradeResult->num_rows > 0) {
        while ($row = $gradeResult->fetch_assoc()) {
            $gradeLabels[] = $row['Grade'];
            $gradeData[] = $row['fail_count'];
            $gradeBackgroundColor[] = 'rgba(255, 159, 64, 0.2)';
            $gradeBorderColor[] = 'rgba(255, 159, 64, 1)';
        }
    }


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

        // Generate data for the grade pie chart
        var gradeData = {
            labels: <?php echo json_encode($gradeLabels); ?>,
            datasets: [
                {
                    label: "Fail Percentage",
                    data: <?php echo json_encode($gradeData); ?>,
                    backgroundColor: <?php echo json_encode($gradeBackgroundColor); ?>,
                    borderColor: <?php echo json_encode($gradeBorderColor); ?>,
                    borderWidth: 1
                }
            ]
        };

        // Create a grade pie chart on the canvas element
        var gradeCtx = document.getElementById('gradeReportChart').getContext('2d');
        var gradeReportChart = new Chart(gradeCtx, {
            type: 'pie',
            data: gradeData,
            options: {
                responsive: true,
            }
        });
    </script>
</body>
</html>
