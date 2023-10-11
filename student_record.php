<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no">
  
  <link rel="stylesheet" type="text/css" href="style_reg.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- My CSS -->
  <link rel="stylesheet" href="dash.css">


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  
  <title>Student's Record</title>

  <style>
    a:link {
      text-decoration: none;
    }

    a:visited {
      text-decoration: none;
    }

    .container {
      padding-top: 20px;
    }

    .card-body {
      padding: 20px;
    }

    .form-box {
      margin-bottom: 20px;
    }

    .table {
      margin-top: 20px;
    }

    .float-right {
      margin-left: 10px;
    }
  </style>

</head>
<body>

<br><br><br><br>

  <script src="script.js"></script>

  <?php include "menu.php"; ?>
  
  <div class="container pl-5">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="card-body">
          <form action="search.php" method="post" class="form-box px-5">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search_bar" placeholder="Search Record">
              <button class="btn btn-info" name="search">Search</button>
            </div>
          </form>

          <div class="container">
            
            <h4 class="title text-center mt-4">Student Record</h4>

            <table class="table table-bordered">
              <thead class="bg-dark shadow-primary border-radius-lg text-light">
                <tr>
                  <th scope="col">ID Number</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Birthdate</th>
                  <th scope="col">Address</th>
                  <th scope="col">Grade</th>
                  <th scope="col">Operations</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM student";
                  $result = mysqli_query($con, $sql);
                  if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $studID = $row['studID'];
                      $first_name = $row['first_name'];
                      $last_name = $row['last_name'];
                      $birthdate = $row['birthdate'];
                      $address = $row['address'];
                      $grade = $row['grade'];

                      echo '
                        <tr>
                          <th scope="row">'.$studID.'</th>
                          <td>'.$first_name.'</td>
                          <td>'.$last_name.'</td>
                          <td>'.$birthdate.'</td>
                          <td>'.$address.'</td>
                          <td>'.$grade.'</td>

                          <td>
                            <button class="btn bg-primary"><a href="student_edit.php?edit_id='.$studID.'" class="text-light">Edit</a></button>
                            <button class="btn bg-danger"><a href="student_deletef.php?delete_id='.$studID.'" class="text-light">Delete</a></button>
                          </td>
                        </tr>
                      ';
                    }
                  }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
		document.getElementById('student-record').classList += 'active';
	</script>
</body>
</html>

