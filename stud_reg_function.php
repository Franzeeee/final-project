<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $has_error = FALSE;

    /**************/
    // Validate first name
    if (empty($_POST['studID'])) {
        $has_error = TRUE;
        $studID_error_msg = '<i style="color: red; font-size: 20px;">The first name is required.</i>';
    } else {
        $studID = trim(htmlspecialchars($_POST['studID']));
    }

    $sql = "SELECT * FROM student WHERE studID = '$studID'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $has_error = TRUE;
        $studID_error_msg = '<i style="color: red; font-size: 20px;">The student ID is already existing.</i>';
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
    // Validate birthdate
    if (empty($_POST['birthdate'])) {
        $has_error = TRUE;
        $birthdate_error_msg = '<i style="color: red; font-size: 20px;">The birthdate is required.</i>';
    } else {
        $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    }
    /**************/
    // Validate address
    if (empty($_POST['address'])) {
        $has_error = TRUE;
        $address_error_msg = '<i style="color: red; font-size: 20px;">The address is required.</i>';
    } else {
        $address = trim(htmlspecialchars($_POST['address']));
    }
    /**************/
    // Validate grade
    if (empty($_POST['grade'])) {
        $has_error = TRUE;
        $grade_error_msg = '<i style="color: red; font-size: 20px;">The address is required.</i>';
    } else {
        $grade = trim(htmlspecialchars($_POST['grade']));
    }

    if (!$has_error) {
        // Retrieve form data
        $studID = $_POST['studID'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];
        $grade = $_POST['grade'];


        // Insert the user data into the database
        $sql = "INSERT INTO student (studID, first_name, last_name, birthdate, address, grade)
                VALUES ('$studID', '$first_name', '$last_name', '$birthdate', '$address', '$grade')";

        if ($con->query($sql) === TRUE) {
            echo "<script> alert('Student added successfully.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>
