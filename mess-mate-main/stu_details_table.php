<?php
session_start();
?>

<!doctype html>
<html>

<head>
	<title>student details</title>
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

		table {
			font-family: arial, sans-serif;
			width: 60%;
			border-collapse: collapse;

		}

		td,
		th {
			border: 1px solid #2899D1;
			text-align: centre;

			padding: 8px;
		}

		h1 {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}

		h3 {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}
	</style>
</head>

<body>
	<p align="right"><a href="index.php">log out </a></p>


	<?php
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
	$query = mysqli_query($conn, "select * from stu_info ");
	?>
	<table align="center">
		<tr>
			<th colspan="7">
				<h2>STUDENT DETAILS</h2>
			</th>
		</tr>
		<tr>
			<th> Student id </th>
			<th> Student name </th>
			<th> Password </th>
			<th> Date of birth </th>
			<th> Room no. </th>
		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['student_id']; ?></td>
					<td> <?php echo $rows['student_name']; ?></td>
					<td> <?php echo $rows['password']; ?></td>
					<td> <?php echo $rows['date_of_birth']; ?></td>
					<td> <?php echo $rows['room_no']; ?></td>

				</tr>
				<?php
			}
		}
		?>

	</table>
	<?php 
		if ($_SESSION['role'] == "mess_member") {
			echo "<p align='right'><a href='admin.php'>back to home page</a></p>";
		} else if ($_SESSION['role'] == "student") {
			echo "<p align='right'><a href='student_home.php'>back to home page</a></p>";
		}
	?>


</body>

</html>