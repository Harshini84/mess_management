<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "mess_member") {
    header("location:index.php");
}
?>
<!doctype html>
<html>

<head>
	<title>hello...</title>

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
	<p align="right"><a href="index.php">log out </a></p>
	<h3> DEREGISTER A STUDENT </h3>
	<form action="" method="post">
		Enter the student_id of student to be deregistered : <input type="text" name="student_id"></br>
		<input type="submit" value="confirm" name="confirm" />
	</form>

	<?php
	if (isset($_POST["confirm"])) {

		if (!empty($_POST['student_id'])) {
			require_once 'config.php';

            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
			$stu = $_POST['student_id'];
			//	echo $stu;
			$sql = mysqli_query($con, "select * from stu_info where student_id = '" . $stu . "' ");
			$num = mysqli_num_rows($sql);
			if ($num == 0 || !$sql) {
				echo "Student with student id- ";
				echo $stu;
				echo " is not found. </br> please enter a valid student_id...";
				echo "</br>";
				echo "</br>";
			} else {
				$query = " DELETE FROM stu_info where student_id = '" . $stu . "' ";
				$sql1 = mysqli_query($con, $query);
				if (!$sql1) {
					echo ("Error description: " . mysqli_error($con));
					echo "<br>";
					echo "operation failed!!";
				} else {
					echo "The student with student id ";
					echo $stu;
					echo " has been successfully deregistered. ";
				}
				/*		}
										  else
										  {
											  echo "yup";
											  //header("Location: remove_stu.php");  
										  }
										  
										  
							  //		}
									  
									  //else
								  //	{
							  //			echo " Please select yes or no and submit:";
							  //			echo "<br>";
							  //		}
						  //		}
								  
							  */
			}
		} else {
			echo "please enter the student id who should be deregistered and click the confirm button...";
			echo "<br>";
		}

	}


	?>

	<p align="right"><a href="admin.php">click here to visit back </a></p>

</body>

</html>