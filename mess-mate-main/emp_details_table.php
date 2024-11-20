<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "mess_member") {
    header("location:index.php");
}
?>


<!doctype html>
<html>

<head>
	<title>employee details</title>
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


	<?php
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = mysqli_query($conn, "select member_id, member_name, date_of_birth, email_id, phone_no from mess_member ");
	?>
	<table align="center" border="1px" style="width: 1000px; line-height:60px;">
		<tr>
			<th colspan="5">
				<h2>EMPLOYEE DETAILS</h2>
			</th>
		</tr>
		<tr>
			<th> Member id </th>
			<th> Name </th>
			<th> Date of birth </th>
			<th> Email id</th>
			<th> Phone number </th>
		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['member_id']; ?></td>
					<td> <?php echo $rows['member_name']; ?></td>
					<td> <?php echo $rows['date_of_birth']; ?></td>
					<td> <?php echo $rows['email_id']; ?></td>
					<td> <?php echo $rows['phone_no']; ?></td>
				</tr>
				<?php
			}
		}
		?>

	</table>
	<p align="right"><a href="admin.php"> click here to visit back </a></p>


</body>

</html>