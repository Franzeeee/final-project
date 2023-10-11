<?php 
    require "database_connect.php";
    session_start();
    
    if(isset($_SESSION['user_data'])){
        $user_id = $_SESSION['user_data'];

        $user_data = $con->query("SELECT * FROM admin_teacher WHERE adminTeacherID = " . $user_id)->fetch_array();
    } else {
        header('location: index.php');
    }

?>

<!-- SIDEBAR -->
<section id="sidebar">
    <a href="dash.php" class="brand">
      <i class='bx bxs-smile'></i>
      <span class="text">Final Project</span>
    </a>

    <div class="px-3" style="line-height: 7px">
        <h4>Welcome <?= $user_data['user_type']; ?>!</h4><br/>
        <?= ucwords($user_data['first_name'] . ' ' . $user_data['last_name']); ?>
    </div>

    <ul class="side-menu top">
      <?php if($user_data['user_type'] == 'admin') { ?>
        <li id="dashboard">
          <a href="dash.php">
            <i class='bx bxs-dashboard'></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li id="register-record">
          <a href="register_record.php">
            <i class='bx bxs-doughnut-chart' ></i>
            <span class="text">Register Record</span>
          </a>
        </li>
        <li id="student-register">
          <a href="student_register.php">
            <i class='bx bxs-message-dots' ></i>
            <span class="text">Student Register</span>
          </a>
        </li>
        <li id="student-record">
          <a href="student_record.php">
            <i class='bx bxs-group' ></i>
            <span class="text">Student Record</span>
          </a>
        </li>

        
      <?php } else { ?>

        <li id="student-register">
          <a href="student_register.php">
            <i class='bx bxs-message-dots' ></i>
            <span class="text">Student Register</span>
          </a>
        </li>

        <li id="student-record">
          <a href="student_record.php">
            <i class='bx bxs-group' ></i>
            <span class="text">Student Record</span>
          </a>
        </li>
      <?php } ?>
    </ul>
    <ul class="side-menu">
      <li>
        <a href="logout-function.php" class="logout">
          <i class='bx bxs-log-out-circle' ></i>
          <span class="text">Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- SIDEBAR -->