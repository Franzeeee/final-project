<?php 
	require_once("rfunction.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style_reg.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<title>Register</title>
</head>
<body>
  
<br><br><br><br>

<script src="script.js"></script>

<div class="container">
	<div class="row px-3">
		<div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
			<div class="card-body">

				<h4 class="title text-center mt-4">Admin/Teacher Register</h4>

				<form class="form-box px-3" action="" method="POST" enctype="multipart/form-data">

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
					</div>	

					<div class="required_message">
						<?php if(isset($first_name_error_msg)) echo $first_name_error_msg; ?>
					</div>
					
					<!-- Last Name input -->
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?php if(isset($last_name)) echo $last_name; ?>" >
					</div>	

					<div class="required_message">
						<?php if(isset($last_name_error_msg)) echo $last_name_error_msg; ?>
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

					<!-- Password input -->
					<div class="form-input">
						<span><i class="fa fa-key"></i></span>
						<input type="password" name="password" placeholder="Password" class="form-control" value="<?php if(isset($password)) echo $password; ?>"> 
					</div>

					<div class="required_message">
						<?php if(isset($password_error_msg)) echo $password_error_msg; ?>
					</div>

					<!-- User Type selection -->
					<div class="input-group input-group-outline mb-3 mx-3">
						<label class="mx-2">User Type:</label>
						<div class="form-check mx-2">
							<input class="form-check-input" type="radio" name="user_type" value="admin" id="admin" <?php if(isset($_POST['user_type']) && $_POST['user_type'] == 'admin') echo 'checked'; ?>>
							<label class="form-check-label" for="admin">Admin</label>
						</div>

						<div class="form-check mx-2">
							<input class="form-check-input" type="radio" name="user_type" value="teacher" id="teacher" <?php if(isset($_POST['user_type']) && $_POST['user_type'] == 'teacher') echo 'checked'; ?>>
							<label class="form-check-label" for="teacher">Teacher</label>
						</div>
					</div>
					
					<div class="required_message">
						<?php if(isset($user_type_error_msg)) echo $user_type_error_msg; ?>
					</div>

					<div class="mb-3">
						<button type="submit" name="register" class="btn btn-block text-uppercase">Register</button>
					</div>

					<hr class="my-4">

					<div class="text-center mb-2"> 
						Have an account already? <a href="index.php" class="register-link"><b>Login here</b></a>
					</div>
				</form>
			</div>
		</div>
    </div>
</body>
</html>
