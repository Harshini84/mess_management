<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "mess_member") {
    header("location:index.php");
}
?>


<!doctype html>
<html>

<head>
	<title>used stock details</title>
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

	<?php
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
	$query = mysqli_query($conn, "select * from used_stock_details ");
	?>
	<table align="center" border="1px" style="width:800px; line-height:60px;">
		<tr>
			<th colspan="7">
				<h2>AVAILABLE STOCK DETAILS</h2>
			</th>
		</tr>
		<tr>
			<th> Item name </th>
			<th> Units </th>
			<th> Quantity used </th>
			<th> Quantity left </th>
			<th> Date </th>
		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['item_name']; ?></td>
					<td> <?php echo $rows['unit']; ?></td>
					<td> <?php echo $rows['quantity_used']; ?></td>
					<td> <?php echo $rows['quantity_left']; ?></td>
					<td> <?php echo $rows['date']; ?></td>


				</tr>
				<?php
			}
		}
		?>

	</table>
	<p align="right"><a href="admin.php"> click here to visit back </a></p>


</body>

</html>