<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center mb-4">MANAGE ACCOUNTS</h2>
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>NAME</th>
                    <th>ROLE</th>
                    <th>DELETE_ACC</th>
                   </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Manoj</td>
                        <td>Student</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Harsha</td>
                        <td>Student</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Gowthami</td>
                        <td>Student</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Akhilesh</td>
                        <td>Student</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ganapathi</td>
                        <td>Student</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Darshan</td>
                        <td>Student</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Class Advisor C</td>
                        <td>Faculty</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Faculty 2</td>
                        <td>Faculty</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Faculty 3</td>
                        <td>Faculty</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Faculty 4</td>
                        <td>Faculty</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
               </table>
            </div>
          </div>
        </div>
    </div>
   </body>
</html>