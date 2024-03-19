<?php
  $db_host = "localhost";
  $db_user = "root";
  $db_pw = "";
  $db_name = "grace_marks";
  $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
  session_start();
  $clientName = $_SESSION['name'];
	$clientID = $_SESSION['id'];

	$displayFileError = false;
	$displayFileUploaded = false;
	$filesExists = false;

	$fetchFileDetails = "SELECT * FROM `documents` where id = '$clientID';";
	$fileDetails = mysqli_query($conn, $fetchFileDetails);

	$numFileDetails = mysqli_num_rows($fileDetails);

	if($numFileDetails != 0){
		$file_exists = true;
	}
	else{
		$file_exists = false;
	}
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Connect to database
    
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $Name1 = $_POST['full_name'];
    $Email = $_POST['email'];
    $Event = $_POST['events'];
    $file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
    $FileName = $fileName;
    // Query the database
    $sql = "SELECT  PhoneNum, Branch, Batch FROM student WHERE RollNum='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $phone=$row['PhoneNum'];
    $branch=$row['Branch'];
    $batch=$row['Batch'];
    $sql1="INSERT INTO `upload_docs`(`roll_num`, `name`, `email`, `ph_no`, `branch`, `batch`, `event_name`, `filename`) VALUES ('$id','$name','$Email','$phone','$branch','$batch','$Event','$FileName')";
    $result1 = mysqli_query($conn, $sql1);
   

		$fileTempName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileType = $_FILES['file']['type'];

		$fileExt = explode('.', $fileName);
		$fileExtension = strtolower(end($fileExt));

		if($fileExtension == 'pdf'){
			$fileNewName = uniqid('', true);
			$fileDestination = "D:\\DontChange\\htdocs\\Smart_Grace_Mark_Generator\\teacher\\uploads\\".$fileNewName.'.pdf';
			move_uploaded_file($fileTempName, $fileDestination);

			$displayFileUploaded = true;

			$insertFile = "INSERT INTO `documents` values('$clientID', '$fileName', '$fileNewName','$fileDestination');";

			mysqli_query($conn, $insertFile);
		}
		header("Location: #");
  }

  if (isset($_GET['file_id'])) {
		$id = $_GET['file_id'];
	
		// fetch file to show from database
		$sql = "SELECT * FROM `documents` WHERE fileCode = '$id';";
	
		$file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `documents` WHERE fileCode = '$id';"));
		$filepath = @"D:\\DontChange\\htdocs\\Smart_Grace_Mark_Generator\\teacher\\uploads\\".$file['fileCode'].'.pdf';
		echo $filepath;
	
		if (file_exists($filepath)) {
			header("Content-type: application/pdf");
			header("Content-Length: " . filesize($filepath));
			readfile($filepath);
	
			exit;
			echo 'File exists';
		}
	
	}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload_Docs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            .shadow-box {
          box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
          border-radius: 0.25rem;
          padding: 1rem;
          margin: 1rem auto;
          max-width: 600px;
          margin-left: 200px;
      }
      .form-control {
  height: 40px;
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
                        <a class="nav-link active" aria-current="page" href="stud_grace_mark_list.php">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="stud_doc_status.php">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="grades.php">Grades</a>
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
    <div class="upload_text">
        <h2 class="heading_1" style="font-weight: bold; text-align: left; margin-left: 200px; margin-top: 20px;">Document Upload Form </h2>
        <h5 class="heading_3" style="text-align: left; margin-left: 200px;">Please enter photos in a descent manner</h5>
    </div>
    <div class="shadow-box">
      <form onsubmit="return validateForm()" action="#" method="POST"  enctype="multipart/form-data">
        <div class="mb-3">
          <label for="full_name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <!-- <div class="mb-3">
          <label for="roll_number" class="form-label">Roll Number</label>
          <input type="text" class="form-control" id="roll_number" name="roll_number" placeholder="Enter your roll number">
        </div> -->
        <div class="mb-3">
          <label for="events">Events</label>
          <select name="events" id="events" placeholder="Select Event"  name= class="form-control">
            <option value="">-- Please select an option --</option>
            <option value="Gokulastami">Gokulashtami</option>
            <option value="Ugadhi">Ugadi</option>
            <option value="Anokha">Anokha</option>
            <option value="NSS">NSS</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="document" class="form-label">Document</label>
          <input type="file" class="form-control" id="document" name="file" >
        </div>
        <button type="submit" class="btn btn-primary" name="upload" >Submit</button>
      </form>
    </div>
    <script>
      function validateForm() {
      let fullName = document.getElementById("full_name").value.trim();
      let email = document.getElementById("email").value.trim();
      let rollNumber = document.getElementById("roll_number").value.trim();
      let events = document.getElementById("events").value;
      let document = document.getElementById("document").value;

      let documentError = document.getElementById("documentError");
      let nameError = document.getElementById("nameError");
      let emailError = document.getElementById("emailError");
      let rollError = document.getElementById("rollError");
      let eventError = document.getElementById("eventsError");
      
      if (fullname == "") {
        nameError = "Name is required";
      }

      // validate email
      if (email == "") {
        emailError = "Email is required";
      } else if (!/\S+@\S+\.\S+/.test(email)) {
        emailError = "Invalid email format";
      }

      // validate roll number
      if (rollNumber == "") {
        rollError = "Roll Number is required";
      }

      // validate event
      if (events == "") {
        eventError = "Event is required";
      }

      // Check if document field is empty
      if (document == "") {
        documentError.textContent = "Please upload a document.";
        return false;
      } else {
        documentError.textContent = "";
      }

      return true;
    }
    </script>
  </body>
</html>