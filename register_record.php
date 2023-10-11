<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  
  <title>Admin/Teacher Record</title>

  <!-- CSS styles -->
  <style>
    /* CSS styles for various elements */

    a:link,
    a:visited {
      text-decoration: none;
      color: white;
    }

    a:hover {
      color: white;
    }

    .container {
      padding-top: 20px;
    }

    .card-body {
      padding: 20px;
    }

    .table {
      margin-top: 20px;
    }

    .float-right {
      margin-left: 10px;
    }

    .profile-picture {
      width: 150px;
      height: 150px;
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
        <!-- Search form -->
        <form action="search.php" method="post" class="form-box px-5">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="search_bar" placeholder="Search Record">
            <button class="btn btn-info" name="search">Search</button>
          </div>
        </form>

        <!-- Teacher's Record -->
        <div>
          <h4 class="title text-center mt-4">Admin/Teacher Record</h4>
          <table class="table table-bordered">
            <thead class="bg-dark shadow-primary border-radius-lg text-light">
              <tr>
                <th scope="col">Admin/Teacher ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Profile</th>
                <th scope="col">Username</th>
                <th scope="col">User Type</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // Fetch teacher records from the database
                $sql = "SELECT * FROM admin_teacher";
                $result = mysqli_query($con, $sql);
                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $adminTeacherID = $row['adminTeacherID'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $profile_picture = $row['profile_picture'];
                    $username = $row['username'];
                    $user_type = $row['user_type'];

                    // Display profile picture
                    $profile_display = '';
                    if ($profile_picture) {
                      $path = 'uploads/' . $profile_picture;
                      if (file_exists($path)) {
                        $profile_display = '<img src="uploads/' . $profile_picture . '" alt="Profile Picture" class="profile-picture">';
                      } else {
                        $profile_display = '<img src="default_avatar.png" alt="Profile Picture" class="profile-picture">';
                      }
                    } else {
                      $profile_display = '<img src="default_avatar.png" alt="Profile Picture" class="profile-picture">';
                    }

                    // Display teacher record in table
                    echo '
                      <tr>
                        <td>'.$adminTeacherID.'</td>
                        <td>'.$first_name.'</td>
                        <td>'.$last_name.'</td>
                        <td>'.$profile_display.'</td>
                        <td>'.$username.'</td>
                        <td>'.$user_type.'</td>
                        <td>
                          <button class="btn bg-primary"><a href="reg_edit.php?edit_id='.$adminTeacherID.'" class="text-light">Edit</a></button>
                          <button class="btn bg-danger border-radius-lg"><a href="reg_delete.php? delete_id='.$adminTeacherID.'" class="text-light">Delete</a></button>
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
		document.getElementById('register-record').classList += 'active';
	</script>
</body>
</html>
