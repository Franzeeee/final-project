<!DOCTYPE html>
<html lang="en">
<head>
<?php include "header.php"; ?>

<!-- Title -->
<title>Final Project</title>

	<title>Final Project</title>
</head>
<body>

 <?php include "menu.php"; ?>
<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
		</main>

	<script>
		document.getElementById('dashboard').classList += 'active';
	</script>
</body>
</html>


