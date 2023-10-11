<?php
    require_once("database_connect.php");
    session_start();

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $has_error = FALSE;
                 
                    /****/
                if(empty($_POST['username']))
                    {
                        $has_error = TRUE;
                        $user_name_error_msg = '<i style="color: red; font-size: 20px;">The username is required.</i>';
                    }
                else
                    {
                        $username = trim(htmlspecialchars($_POST['username']));
                    }
                    /****/
                if(empty($_POST['password']))
                    {
                        $has_error = TRUE;
                        $password_error_msg = '<i style="color: red; font-size: 20px;">The password is required.</i>';
                    }
                else
                    {
                        $password = trim(htmlspecialchars($_POST['password']));
                        if( strlen($password) < 8)
                        {
                            $has_error = TRUE;
                            $password_error_msg = '<i style="color: red; font-size: 20px;">The Password should consist of at least 8 characters in length.</i>';
                        }
                    }
        if(!$has_error){
            // login
            $username = $_POST['username'];
            $password = $_POST['password'];

            $find = $con->query("SELECT * FROM `admin_teacher` WHERE username LIKE BINARY '$username'");

            // check if there is match for username
            if($find->num_rows > 0)
            {
                $data = $find->fetch_array();

                if (password_verify($password, $data['password'])) {
                    //echo "OK!";
                    $_SESSION['user_data'] = $data['adminTeacherID'];

                    if($data['user_type'] == 'admin'){
                        header("location: dash.php");
                    } else {
                        header("location: student_record.php");
                    }
                } else {
                    //$password = '';
                    echo "<script> alert('Username or Password is incorrect!!');</script>";
                }
            } else {
                //$password = '';
                echo "<script> alert('Username or Password is incorrect!');</script>";
            }
        }


}