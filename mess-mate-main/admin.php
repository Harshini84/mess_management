<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "mess_member") {
    header("location:index.php");
}
?>

<!doctype html>
<html>

<head>
    <title>Admin page</title>
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
    echo "Welcome to Mess Committee page ...";
    echo "<br>";
    echo "Mess Committee Member - ";
    echo $_SESSION['name'];
    echo "<br>";
    echo "Name - ";
    echo $_SESSION['sess_user'];
    echo "<br>";
    ?>
    <h3>STUDENT :</h3>
    <a href="remove_stu.php">Click here to remove a student</a><br>
    <a href="stu_details_table.php">Click here to view student details</a><br>
    <a href="view_feedback.php">Click here to view Feedback</a><br>
    <br><br><br>
    <h3>EMPLOYEE :</h3>
    <a href="remove_emp.php">Click here to remove an employee</a><br>
    <a href="emp_details_table.php">Click here to view employee details</a><br>
    <h3>MESS MENU:</h3>
    <a href="mess_menu.php">Click here to view mess menu</a></br>
    <a href="change_menu.php">Click here to change mess menu</a><br><br><br>
    <h3>STOCK DETAILS :</h3>
    <a href="purchases.php">Click here to view purchase details</a><br>
    <a href="available_stock_details.php">Click here to view used stock details</a><br>
    <a href="add_into_new_stock.php">Click here to update new stock details</a><br>
    <a href="add_into_used_stock.php">Click here to update used stock details</a><br><br><br>






</body>

</html>