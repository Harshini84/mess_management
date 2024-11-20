<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "mess_member") {
    header("location:index.php");
}
?>
<!doctype html>
<html>

<head>
	<title>Remove employee</title>

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
	</style>

</head>

<body>
	<h3> DEREGISTER AN EMPLOYEE </h3>
	<form action="" method="post">
		Enter the employee_id of employee to be deregistered : <input type="text" name="emp_id"></br>
		<input type="submit" value="confirm" name="confirm" />
	</form>

	<?php
	if (isset($_POST["confirm"])) {

		if (!empty($_POST['emp_id'])) {
			require_once 'config.php';

            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
			$stu = $_POST['emp_id'];
			//	echo $stu;
			$sql = mysqli_query($con, "select * from mess_member where emp_id = '" . $stu . "' ");
			$num = mysqli_num_rows($sql);
			if ($num == 0 || !$sql) {
				echo "Employee with employee id- ";
				echo $stu;
				echo " is not found. </br> please enter a valid employee_id...";
				echo "</br>";
				echo "</br>";
			} else {
				$query = " DELETE FROM mess_member where emp_id = '" . $stu . "' ";
				$sql1 = mysqli_query($con, $query);
				if (!$sql1) {
					echo ("Error description: " . mysqli_error($con));
					echo "<br>";
					echo "operation failed!!";
				} else {
					echo "The employee with employee id ";
					echo $stu;
					echo " has been successfully deregistered. ";
				}

			}
		} else {
			echo "please enter the employee id who should be deregistered and click the confirm button...";
			echo "<br>";
		}

	}


	?>

	<p align="right"><a href="admin.php">click here to visit back </a></p>

</body>

</html>