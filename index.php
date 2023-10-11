<?php 
    require_once("lfunction.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="dash.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>

                <div class="card-body">
                    <h4 class="title text-center mt-4">
                        Login
                    </h4>

                    <form role="form" class="form-box px-3" method="post" action="">
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="username" placeholder="Username" class="form-control" value="<?php if (isset($username)) echo $username; ?>">
                        </div>
                    
                        <div class="required_message">
                            <?php if(isset($user_name_error_msg)) echo $user_name_error_msg; ?>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password" class="form-control" value="<?php if (isset($password)) echo $password; ?>">
                        </div>

                        <div class="required_message">
                            <?php if(isset($password_error_msg)) echo $password_error_msg; ?>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="login" class="btn btn-block text-uppercase">Login</button>
                        </div>

                        <div class="text-right">
                            <a href="#" class="forget-link">Forget Password?</a>
                        </div>

                        <hr class="my-4">

                        <div class="text-center mb-2">
                            Don't have an account? <a href="register.php" class="register-link">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>