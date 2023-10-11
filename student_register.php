<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  
  <title>Student Register</title>

</head>
<body>

<br><br><br><br>

  <script src="script.js"></script>
  <?php 
    include "menu.php"; 

    require_once ("stud_reg_function.php");
  ?>
  
  <div class="container pl-5">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
      <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">

          <h4 class="title text-center mt-4"> 
            Add Student Info
          </h4>

          <form class="form-box px-3" role="form" action="" method="POST">

          <div class="form-input">
              <span><i class="fa  fa-id-badge"></i></span>
              <input type="text" name="studID" placeholder="Student Id Number" class="form-control" value="<?php if(isset($studID)) echo $studID; ?>">
          </div>
          <div class="required_message">
              <?php if(isset($studID_error_msg)) echo $studID_error_msg; ?>
          </div>
            
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php if(isset($first_name)) echo $first_name; ?>">
                    </div>
                        <div class="required_message">
                          <?php if(isset($first_name_error_msg)) echo $first_name_error_msg; ?>
                        </div>

          <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?php if(isset($last_name)) echo $last_name; ?>" >

            <div class="required_message">
                <?php if(isset($last_name_error_msg)) echo $last_name_error_msg; ?>
            </div>
          </div>

          <div class="form-input">
              <span><i class="fa fa-cubes"></i></span>
              <input type="date" name="birthdate" placeholder="Birthdate" class="form-control" value="<?php if(isset($birthdate)) echo $birthdate; ?>">
          </div>
          <div class="required_message">
              <?php if(isset($birthdate_error_msg)) echo $birthdate_error_msg; ?>
          </div>          

          <div class="form-input">
              <span><i class="fa fa-address-card"></i></span>
              <input type="text" name="address" placeholder="Address" class="form-control" value="<?php if(isset($address)) echo $address; ?>"> 
          </div>

          <div class="required_message">
            <?php if(isset($address_error_msg)) echo $address_error_msg; ?>
          </div>

          <div class="form-input">
              <span><i class="fa fa-address-card"></i></span>
              <input type="text" name="grade" placeholder="Grade" class="form-control" value="<?php if(isset($grade)) echo $grade; ?>"> 
          </div>

          <div class="required_message">
            <?php if(isset($grade_error_msg)) echo $grade_error_msg; ?>
          </div>
                      
          <div class="mb-5">
              <button type="submit" name="submit" class="btn btn-block text-uppercase">Submit
              </button>
          </div>

            <hr class="my-4">

            <div class="text-center mb-2">
              <a href="http://localhost/Final%20Project/student_record.php" class="register-link">
                Records
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
		document.getElementById('student-register').classList += 'active';
	</script>
</body>
</html>
