<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Marks</title>
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
    .box {
      background-color: white;
      box-shadow: 0px 0px 10px #888;
      width: 500px;
      height: 300px;
      margin: 50px auto;
      padding: 30px;
      text-align: center;
      border-radius: 0;
    }
    .box h2 {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .box label {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .box input {
      width: 80%;
      margin-bottom: 20px;
      padding: 10px;
      font-size: 18px;
      border-radius: 5px;
      border: none;
      box-shadow: 0px 0px 5px #ccc;
    }
    .box button {
      padding: 10px 20px;
      font-size: 18px;
      font-weight: bold;
      color: white;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .box button:hover {
      background-color: #0069d9;
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
                        <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_view_requests.php">View Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="calci1.php">Grace Mark</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                          Other
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="Admin_Edit_Profile.php">Edit Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="login.php">Logout</a></li>
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
                        <h5 class="card-title text-center mb-4">ID</h5>
                        <form>
                            <div class="mb-3">
                                <label for="student-id" class="form-label">Description:</label>
                                <input type="text" class="form-control" id="student-id">
                            </div>
                            <div class="mb-3">
                                <label for="marks" class="form-label">Grace Marks:</label>
                                <input type="number" class="form-control" id="marks" min="0">
                            </div>
                            <button type="submit" class="btn btn-primary d-block mx-auto">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>