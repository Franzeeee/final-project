<?php
require_once('database_connect.php');

session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $has_error = FALSE;

    /**************/
    // Validate first name
    if (empty($_POST['adminTeacherID'])) {
        $has_error = TRUE;
        $adminTeacherID_error_msg = '<i style="color: red; font-size: 20px;">The id number is required.</i>';
    } else {
        $adminTeacherID = trim(htmlspecialchars($_POST['adminTeacherID']));
    }

    $sql = "SELECT * FROM admin_teacher WHERE adminTeacherID = '$adminTeacherID'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $has_error = TRUE;
        $adminTeacherID_error_msg = '<i style="color: red; font-size: 20px;">The id number is already existing.</i>';
    }
    /**************/
    // Validate first name
    if (empty($_POST['first_name'])) {
        $has_error = TRUE;
        $first_name_error_msg = '<i style="color: red; font-size: 20px;">The first name is required.</i>';
    } else {
        $first_name = trim(htmlspecialchars($_POST['first_name']));
    }
    /**************/
    // Validate last name
    if (empty($_POST['last_name'])) {
        $has_error = TRUE;
        $last_name_error_msg = '<i style="color: red; font-size: 20px;">The last name is required.</i>';
    } else {
        $last_name = trim(htmlspecialchars($_POST['last_name']));
    }
    /**************/
    // Validate profile picture
    if (empty($_FILES['profile_picture']['name'])) {
        $has_error = TRUE;
        $profilepicture_error_msg = '<i style="color: red; font-size: 20px;">Please upload a profile picture.</i>';
    } else {
        $avatar_name = $_FILES['profile_picture']['name'];
        $avatar_size = $_FILES['profile_picture']['size'];

        // Validate file size (maximum 5MB)
        $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes

        if ($avatar_size > $maxFileSize) {
            $has_error = true;
            $profilepicture_error_msg = '<i style="color: red; font-size: 20px;">Profile picture exceed 5MB.</i>';
        } else {
            $avatar_tmp_name = $_FILES['profile_picture']['tmp_name'];
            $avatar_folder = 'uploads/' . $avatar_name;

            // Move the uploaded file to the desired location
            if (move_uploaded_file($avatar_tmp_name, $avatar_folder)) {
                // File upload success
                $avatarP = $avatar_name; // Store only the filename in the $avatar variable
            } else {
                $has_error = true;
                $profile_picture_error_msg = '<i style="color: red; font-size: 20px;">Failed to upload the profile picture.</i>';
            }
        }
    }
    /**************/
    // Validate username
    if (empty($_POST['username'])) {
        $has_error = TRUE;
        $user_name_error_msg = '<i style="color: red; font-size: 20px;">The username is required.</i>';
    } else {
        $username = trim(htmlspecialchars($_POST['username']));

        // Check if the username already exists in the database
        $sql = "SELECT * FROM admin_teacher WHERE username = '$username'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $has_error = TRUE;
            $user_name_error_msg = '<i style="color: red; font-size: 20px;">The username is already taken.</i>';
        }
    }
    /**************/
    // Validate password
    if (empty($_POST['password'])) {
        $has_error = TRUE;
        $password_error_msg = '<i style="color: red; font-size: 20px;">The password is required.</i>';
    } else {
        $password = trim(htmlspecialchars($_POST['password']));
        if (strlen($password) < 8) {
            $has_error = TRUE;
            $password_error_msg = '<i style="color: red; font-size: 20px;">The Password should consist of at least 8 characters in length.</i>';
        }
    }
    /**************/
    // Validate user type
    if (empty($_POST['user_type'])) {
        $has_error = TRUE;
        $user_type_error_msg = '<i style="color: red; font-size: 20px;">The user type is required.</i>';
    } else {
        $user_type = trim(htmlspecialchars($_POST['user_type']));
    }

    if (!$has_error) {
        $adminTeacherID = $_POST['adminTeacherID'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $profile_picture = $avatarP;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        // Encrypt the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $sql = "INSERT INTO admin_teacher (adminTeacherID, first_name, last_name, profile_picture, username, password, user_type)
                VALUES ('$adminTeacherID', '$first_name', '$last_name', '$profile_picture', '$username', '$hashed_password', '$user_type')";
    
        if ($con->query($sql) === TRUE) {
            echo "<script> alert('User registered successfully.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>
