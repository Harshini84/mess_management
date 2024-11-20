<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "mess_member") {
    header("location:index.php");
}
?>


<!doctype html>
<html>

<head>
    <title>add into used stock details</title>
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

        h2 {
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

    <center>
        <h1>USED ITEM DETAILS</h1>
    </center>

    <h2>Enter the details of item:</h2>
    <form action="" method="POST">
        <legend>
            <fieldset>
                Item name : <input type="text" name="item_name"><br />
                Unit : <input type="text" name="unit"><br />
                Quantity used : <input type="text" name="quantity_used"><br />
                Quantity left : <input type="text" name="quantity_left"><br />

                <input type="submit" value="submit" name="submit" />

            </fieldset>
        </legend>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        if (!empty($_POST['item_name']) && !empty($_POST['quantity_used']) && !empty($_POST['unit']) && !empty($_POST['quantity_left'])) {
            $item_name = $_POST['item_name'];
            $quantity_used = $_POST['quantity_used'];
            $unit = $_POST['unit'];
            $quantity_left = $_POST['quantity_left'];

            require_once 'config.php';

            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
            $date = date('Y-m-d H:i:s');
            $query = mysqli_query($con, "insert into used_stock_details(item_name,unit,quantity_used,quantity_left,date)
                         values('" . $item_name . "','" . $unit . "','" . $quantity_used . "','" . $quantity_left . "','" . $date . "')");

            $query1 = mysqli_query($con, "update used_stock_details set date = curdate() where item_name = '" . $item_name . "' and date = '" . "'. $date .'");
            if ($query1 && $query) {
                echo "stock details are updated successfully...";
                echo "<br>";
            } else {
                echo "entry for the item ";
                echo $item_name;
                echo " is already done for today...";
                echo "failure";
                echo "<br>";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>

    <p align="right"><a href="admin.php">click here to visit back </a></p>

</body>

</html>