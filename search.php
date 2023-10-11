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

    <title>Search</title>

    <style>
        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a {
            color: white;
        }

        a:hover {
            color: white;
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
                    <center>
                        <h3>Search Result</h3>
                    </center>
                    <table class="table">
                        <?php
                        if (isset($_POST['search'])) {
                            $search_bar = $_POST['search_bar'];

                            // Perform search query
                            $sql = "SELECT * FROM student WHERE studID LIKE '%$search_bar%' OR first_name LIKE '%$search_bar%' OR last_name LIKE '%$search_bar%'";

                            $result = mysqli_query($con, $sql);

                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<thead class="bg-dark shadow-primary border-radius-lg text-light">
                                        <tr>
                                            <th>Student ID</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Birthdate</th>
                                            <th>Address</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>';

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tbody>
                                            <tr>
                                                <td>' . $row['studID'] . '</td>
                                                <td>' . $row['first_name'] . '</td>
                                                <td>' . $row['last_name'] . '</td>
                                                <td>' . $row['birthdate'] . '</td>
                                                <td>' . $row['address'] . '</td>
                                                <td>' . $row['grade'] . '</td>
                                            </tr>
                                        </tbody>';
                                    }
                                } else {
                                    echo '<h2 class=txt-danger>Data not found</h2>';
                                }
                            }
                        }
                        ?>
                    </table>
                  
                </div>
            </div>
        </div>
    </div>

    <script>
		document.getElementById('student-record').classList += 'active';
	</script>
</body>
</html>


