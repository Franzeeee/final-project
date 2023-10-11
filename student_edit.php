<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php"; ?>

    <title>Student Edit</title>
</head>

<body class="">

<br><br><br><br>

  <script src="script.js"></script>

  <?php include "menu.php"; ?>

  <?php

// Check if the 'edit_id' parameter is set in the URL
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];

    // Retrieve the student record from the database based on the ID
    $sql = "SELECT * FROM student WHERE studID = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $studID = $row['studID'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $birthdate = $row['birthdate'];
    $address = $row['address'];
    $grade = $row['grade'];

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $studID = $_POST['studID'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];
        $grade = $_POST['grade'];

        // Update the student record in the database
        $sql = "UPDATE student SET studID='$studID', first_name='$first_name', last_name='$last_name',birthdate='$birthdate', address='$address', grade='$grade' WHERE studID=$id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Redirect to the student record page after successful edit
            header('location:student_record.php');
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>
                <div class="card-body">
                    <h4 class="title text-center mt-4">
                        Edit Student Info
                    </h4>
                    <form role="form" method="post" action="">
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="studID" placeholder="Student ID" class="form-control"
                                value="<?php if (isset($studID)) echo $studID; ?>">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="first_name" placeholder="First Name" class="form-control"
                                value="<?php if (isset($first_name)) echo $first_name; ?>">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control"
                                value="<?php if (isset($last_name)) echo $last_name; ?>">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-cubes"></i></span>
                            <input type="text" name="birthdate" placeholder="Birthdate" class="form-control"
                                value="<?php if (isset($birthdate)) echo $birthdate; ?>">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-address-card"></i></span>
                            <input type="text" name="address" placeholder="Address" class="form-control"
                                value="<?php if (isset($address)) echo $address; ?>">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-address-card"></i></span>
                            <input type="text" name="grade" placeholder="Grade" class="form-control"
                                value="<?php if (isset($grade)) echo $grade; ?>">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-info">Submit</button>
                        </div>
                        <hr class="my-4">
                        <div class="text-center mb-2">
                            <a href="student_record.php" class="register-link">
                                <b>Back</b>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
		document.getElementById('student-record').classList += 'active';
	</script>
</body>
</html>

