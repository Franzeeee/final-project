<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="dash.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <title>Register Edit</title>
</head>
<body>
 
<br><br><br><br>

  <script src="script.js"></script>

  <?php 
    include "menu.php"; 

// Check if the 'edit_id' parameter is set in the URL
if (isset($_GET['edit_id'])) {
  $id = $_GET['edit_id'];

  // Retrieve the teacher record from the database based on the ID
  $row = $con->query("SELECT * FROM admin_teacher WHERE adminTeacherID =" . $_GET['edit_id'])->fetch_array();

  // Check if the teacher record exists
  if ($row) {
      $adminTeacherID = $row['adminTeacherID'];
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $profile_picture = $row['profile_picture'];
      $username = $row['username'];
      $user_type = $row['user_type'];

      // Check if the form is submitted
      if (isset($_POST['submit'])) {
          $adminTeacherID = $_POST['adminTeacherID'];
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $username = $_POST['username'];
          $user_type = $_POST['user_type'];

          if($_FILES['profile_picture']['name'])
          {
            // delete current image
              unlink('uploads/' . $row['profile_picture']);

              $new_image = time() . '-' . $_FILES['profile_picture']['name'];
              move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'uploads/' . $new_image);
          } else {
              $new_image = $row['profile_picture'];
          }

          // Update the teacher record in the database
          $sql = "UPDATE admin_teacher SET adminTeacherID='$adminTeacherID', first_name='$first_name', last_name='$last_name', profile_picture='$new_image', username='$username', user_type='$user_type' WHERE adminTeacherID=$id";
          $result = mysqli_query($con, $sql);

          if ($result) {
              // Redirect to the teacher record page after successful edit
              header('Location: register_record.php');
              exit();
          } else {
              die(mysqli_error($con));
          }
      }
  } else {
      die("Teacher record not found");
  }
} else {
  die("No teacher ID specified");
}
  ?>

            <!-- Card body -->
            <div class="container pl-5">
                 <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex" style="background: url('uploads/<?= $row['profile_picture']; ?>') no-repeat; background-size: cover;"></div>
                <div class="card-body">
                <!-- Title -->
                <h4 class="title text-center mt-4">
                    Edit Registered Info
                </h4>

                <!-- Form -->
                <form role="form" method="post" action="" enctype="multipart/form-data">
                    <!-- Admin/Teacher ID input -->
                    <div class="form-input">
                      <span><i class="fa  fa-id-badge"></i></span>
                      <input type="text" name="adminTeacherID" placeholder="ID Number" class="form-control" value="<?php if(isset($adminTeacherID)) echo $adminTeacherID; ?>">
                      </div>
                      <div class="required_message">
                      <?php if(isset($adminTeacherID_error_msg)) echo $adminTeacherID_error_msg; ?>
                    </div>

                    <!-- First Name input -->
                    <div class="form-input">
                      <span><i class="fa fa-user"></i></span>
                      <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php if(isset($first_name)) echo $first_name; ?>">
                      <div class="required_message">
                        <?php if(isset($first_name_error_msg)) echo $first_name_error_msg; ?>
                      </div>
                    </div>
                    
                    <!-- Last Name input -->
                    <div class="form-input">
                      <span><i class="fa fa-user"></i></span>
                      <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?php if(isset($last_name)) echo $last_name; ?>" >
                      <div class="required_message">
                        <?php if(isset($last_name_error_msg)) echo $last_name_error_msg; ?>
                      </div>
                    </div>

                    <!-- Profile Picture input -->
                    <div class="form-input">
                      <span><i class="fa fa-cloud-upload"></i></span>
                      <input type="file" accept="image/jpg, image/jpeg, image/png" name="profile_picture" id="profile_picture" placeholder="Profile Picture" class="form-control">
                    </div>
                    <div class="required_message">
                      <?php if(isset($profile_picture_error_msg)) echo $profile_picture_error_msg; ?> 
                    </div>

                    <!-- Username input -->
                    <div class="form-input">
                      <span><i class="fa fa-user"></i></span>
                      <input type="username" name="username" placeholder="Username" class="form-control" value="<?php if(isset($username)) echo $username; ?>" >
                    </div>
                    <div class="required_message">
                      <?php if(isset($user_name_error_msg)) echo $user_name_error_msg; ?>
                    </div>

                    <!-- User Type selection -->
                    <div class="input-group input-group-outline mb-3 mx-3">
                      <label class="mx-2">User Type:</label>
                      <div class="form-check mx-2">
                        <input class="form-check-input" <?= $row['user_type'] == 'admin' ? 'checked' : ''; ?> type="radio" name="user_type" value="admin" id="admin" >
                        <label class="form-check-label" for="admin">Admin</label>
                      </div>
                      <div class="form-check mx-2">
                        <input class="form-check-input" <?= $row['user_type'] == 'teacher' ? 'checked' : ''; ?> type="radio" name="user_type" value="teacher" id="teacher">
                        <label class="form-check-label" for="teacher">Teacher</label>
                      </div>
                    </div>
                    
                    <!-- Submit button -->
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </div>
                    
                    <!-- Horizontal line -->
                    <hr class="my-4">
                    
                    <!-- Records link -->
                    <div class="text-center mb-2">
                        <a href="register_record.php" class="register-link">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
		document.getElementById('register-record').classList += 'active';
	</script>
</body>
</html>

