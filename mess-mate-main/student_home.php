<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "student") {
    header("location:index.php");
}
?>
<!doctype html>
<html>

<head>
	<title>student login page</title>

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
			font-size: 100%;
		}

		h3 {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}
		input {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}

		.logout {
			position: absolute;
			top: 50px;
			right: 50px;
		}

	</style>

</head>

<body>
	<div class="logout">
		<form action="logout.php" method="post">
			<input type="submit" value="Log out">
		</form>
	</div>

	<?php
	require_once 'config.php';

	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
	$name = mysqli_query($con, "select student_name, room_no from stu_info where student_id = '" . $_SESSION['sess_user'] . "' ");
	$getname = mysqli_fetch_assoc($name);
	echo "Hello...<br>";
	echo $getname['student_name'];
	echo "<br>";
	echo "Student_ID - ";
	echo $_SESSION['sess_user'];
	echo "<br>";
	echo "Room no - ";
	echo $getname['room_no']
		?>


	<center>
		<p><a href="mess_menu.php">View mess menu</a></p>
		<p><a href="send_feedback.php">Submit Feeback form</a></p>
		<p><a href="stu_details_table.php">View HostelMates</a></p>
	</center>
</body>

</html>