<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="style_reg.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="dash.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <title>Student Edit</title>

    <style>
        button {
            margin-right: 20px;
        }
    </style>

</head>

<body class="">

<br><br><br><br>

  <script src="script.js"></script>
  <?php include "menu.php"; ?>

    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">

                <div class="card-body">

                    <?php

                    if (isset($_GET['delete_id'])) {
                        $id = $_GET['delete_id'];

                        // Check if the user confirmed the deletion
                        if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'yes') {

                            // Delete the user from the database
                            $sql = "DELETE FROM student WHERE studID = $id";
                            $result = mysqli_query($con, $sql);

                            if ($result) {
                                header('location:student_record.php');
                            } else {
                                die(mysqli_error($con));
                            }
                        } else {

                        }
                    }
                    ?>

                    <div class="container text-center">
                        <h2>Are you sure you want to delete this record?</h2>
                        <form method="POST">
                            <input type="hidden" name="confirm_delete" value="yes">
                            <button class="btn btn-info" type="submit">Yes</button>
                            <a class="btn btn-info" href="student_record.php">No</a>
                        </form>
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

