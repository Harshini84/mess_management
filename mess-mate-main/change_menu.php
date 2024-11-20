<html>

<head>
	<title>change mess menu</title>
	<style>
		body {
			margin-top: 100px;
			margin-bottom: 100px;
			margin-right: 150px;
			margin-left: 80px;
			background-color: azure;
			color: palevioletred;
			font-family: verdana;
			font-size: 100%
		}

		h1 {
			color: indigo;
			font-family: verdana;
			font-size: 150%;
		}

		h2 {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}

		h4 {
			color: black;
			font-family: verdana;
			font-size: 100%;
		}
	</style>
</head>

<body>

	<center>
		<h1>CHANGE MESS MENU</h1> </br></br>
	</center>

	<form action="" method="post">
		<legend>
			<fieldset>

				Enter meal course that has to be changed : <input type="text" name="meal_course"> <br />
				Enter the day on which the menu has to be changed : <input type="text" name="day"><br />
				Enter the food that has to be served : <input type="text" name="food"><br />
				<input type="submit" name="change_menu" value="change_menu" />
			</fieldset>
		</legend>

	</form>
	<?php
	if (isset($_POST["change_menu"])) {
		if (!empty($_POST['meal_course']) && !empty($_POST['day']) && !empty($_POST['food'])) {

			$meal_course = $_POST['meal_course'];
			$day = $_POST['day'];
			$food = $_POST['food'];

			require_once 'config.php';

            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
			// mysql_select_db('mess_management') or die("cannot select DB"); 
	
			if ($meal_course == 'breakfast') {
				if ($day == 'monday') {
					$query = mysqli_query($con, "UPDATE messmenu set monday = '" . $food . "' where meal_courses_offered =  'breakfast' ");
					if ($query) {
						echo '<br><br><br><br><br>';

						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'tuesday') {
					$query = mysqli_query($con, "UPDATE messmenu set tuesday = '" . $food . "' where meal_courses_offered =  'breakfast' ");
					if ($query) {
						echo "<br><br><br><br><br>";
						?>
							<h4>Changes have been successfully made in mess menu.</h4>
						<?php
					}

				} else if ($day == 'wednesday') {
					$query = mysqli_query($con, "UPDATE messmenu set wednesday = '" . $food . "' where meal_courses_offered =  'breakfast' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}

				} else if ($day == 'thursday') {
					$query = mysqli_query($con, "UPDATE messmenu set thursday = '" . $food . "' where meal_courses_offered =  'breakfast' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}

				} else if ($day == 'friday') {
					$query = mysqli_query($con, "UPDATE messmenu set friday = '" . $food . "' where meal_courses_offered =  'breakfast' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}

				} else if ($day == 'saturday') {
					$query = mysqli_query($con, "UPDATE messmenu set saturday = '" . $food . "' where meal_courses_offered =  'breakfast' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'sunday') {
					$query = mysqli_query($con, "UPDATE messmenu set sunday = '" . $food . "' where meal_courses_offered =  'breakfast' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else {
					echo 'Enter the day details properly....';
				}
			} else if ($meal_course == 'lunch') {
				if ($day == 'monday') {
					$query = mysqli_query($con, "UPDATE messmenu set monday = '" . $food . "' where meal_courses_offered =  'lunch' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'tuesday') {
					$query = mysqli_query($con, "UPDATE messmenu set tuesday = '" . $food . "' where meal_courses_offered =  'lunch' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'wednesday') {
					$query = mysqli_query($con, "UPDATE messmenu set wednesday = '" . $food . "' where meal_courses_offered =  'lunch' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'thursday') {
					$query = mysqli_query($con, "UPDATE messmenu set thursday = '" . $food . "' where meal_courses_offered =  'lunch' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'friday') {
					$query = mysqli_query($con, "UPDATE messmenu set friday = '" . $food . "' where meal_courses_offered =  'lunch' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'saturday') {
					$query = mysqli_query($con, "UPDATE messmenu set saturday = '" . $food . "' where meal_courses_offered =  'lunch' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'sunday') {
					$query = mysqli_query($con, "UPDATE messmenu set sunday = '" . $food . "' where meal_courses_offered =  'lunch' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else {
					echo 'Enter the day details properly....';
				}
			} else if ($meal_course == 'high_tea') {
				if ($day == 'monday') {
					$query = mysqli_query($con, "UPDATE messmenu set monday = '" . $food . "' where meal_courses_offered =  'high_tea' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'tuesday') {
					$query = mysqli_query($con, "UPDATE messmenu set tuesday = '" . $food . "' where meal_courses_offered =  'high_tea' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'wednesday') {
					$query = mysqli_query($con, "UPDATE messmenu set wednesday = '" . $food . "' where meal_courses_offered =  'high_tea' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'thursday') {
					$query = mysqli_query($con, "UPDATE messmenu set thursday = '" . $food . "' where meal_courses_offered =  'high_tea' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'friday') {
					$query = mysqli_query($con, "UPDATE messmenu set friday = '" . $food . "' where meal_courses_offered =  'high_tea' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'saturday') {
					$query = mysqli_query($con, "UPDATE messmenu set saturday = '" . $food . "' where meal_courses_offered =  'high_tea' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'sunday') {
					$query = mysqli_query($con, "UPDATE messmenu set sunday = '" . $food . "' where meal_courses_offered =  'high_tea' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else {
					echo 'Enter the day details properly....';
				}

			} else if ($meal_course == 'dinner') {
				if ($day == 'monday') {
					$query = mysqli_query($con, "UPDATE messmenu set monday = '" . $food . "' where meal_courses_offered =  'dinner' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'tuesday') {
					$query = mysqli_query($con, "UPDATE messmenu set tuesday = '" . $food . "' where meal_courses_offered =  'dinner' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'wednesday') {
					$query = mysqli_query($con, "UPDATE messmenu set wednesday = '" . $food . "' where meal_courses_offered =  'dinner' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'thursday') {
					$query = mysqli_query($con, "UPDATE messmenu set thursday = '" . $food . "' where meal_courses_offered =  'dinner' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'friday') {
					$query = mysqli_query($con, "UPDATE messmenu set friday = '" . $food . "' where meal_courses_offered =  'dinner' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'saturday') {
					$query = mysqli_query($con, "UPDATE messmenu set saturday = '" . $food . "' where meal_courses_offered =  'dinner' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else if ($day == 'sunday') {
					$query = mysqli_query($con, "UPDATE messmenu set sunday = '" . $food . "' where meal_courses_offered =  'dinner' ");
					if ($query) {
						echo 'Changes have been successfully made in mess menu.';
					}
				} else {
					echo 'Enter the day details properly....';
				}
			} else {
				echo "Enter the name of the meal course details that has to be changed properly";
			}

		} else {
			echo "All fields are required!";
		}

	}
	?>

	<p align="right"><a href="admin.php">click here to visit back </a></p>

</body>

</html>