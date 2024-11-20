<?php
session_start();
?>

<!doctype html>
<html>

<head>
	<title>Mess Menu</title>
	<style>
		body {

			margin-top: 100px;
			margin-bottom: 100px;
			margin-right: 150px;
			margin-left: 80px;
			background-color: azure;
			color: #7B241C;
			font-family: verdana;
			font-size: 100%
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

		h2 {
			color: black;
			font-family: verdana;
			font-size: 200%;
		}

		table,
		th,
		td {
			border: 1px solid black;
		}
	</style>
</head>

<body>
	<p align="right"><a href="index.php">log out </a></p>




	<?php
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	$query = mysqli_query($conn, "select * from messmenu ");
	?>
	<table align="center" border="1px" style="width:800px; line-height:60px;">
		<tr>
			<th style="background-color:#D7DBDD" colspan="9">
				<h2>Mess Menu</h2>
			</th>
		</tr>
		<tr>
			<th font color="red"> meal_courses_offered </th>
			<th class="orange"> cost </th>
			<th> monday </th>
			<th> tuesday </th>
			<th> wednesday </th>
			<th> thursday </th>
			<th> friday </th>
			<th> saturday </th>
			<th> sunday </th>
		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['meal_courses_offered']; ?></td>
					<td> <?php echo $rows['cost']; ?></td>
					<td> <?php echo $rows['monday']; ?></td>
					<td> <?php echo $rows['tuesday']; ?></td>
					<td> <?php echo $rows['wednesday']; ?></td>
					<td> <?php echo $rows['thursday']; ?></td>
					<td> <?php echo $rows['friday']; ?></td>
					<td> <?php echo $rows['saturday']; ?></td>
					<td> <?php echo $rows['sunday']; ?></td>

				</tr>
				<?php
			}
		}
		?>

	</table>
	<?php
	if ($_SESSION['role'] == "mess_member") {
		echo "<p align='right'><a href='admin.php'>back to home page </a></p>";
	} else if ($_SESSION['role'] == "student") {
		echo "<p align='right'><a href='student_home.php'>back to home page</a></p>";
	}
	?>

</body>

</html>