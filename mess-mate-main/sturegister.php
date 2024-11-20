<!doctype html>
<html>

<head>
    <title>Register</title>
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
    </style>
</head>

<body>

    <center>
        <h1>REGISTER A STUDENT</h1>
    </center>

    <center>
        <h2>Registration Form</h2>
    </center>
    <form action="" method="POST">
        <legend>
            <fieldset>

                Student id : <input type="text" name="user"><br />
                student name : <input type="text" name="stu_name"><br />
                Password : <input type="password" name="pass"><br />
                Confirm Password: <input type="password" name="cpass"><br />
                date of birth : <input type="date" name="d_o_b"><br />
                Room no : <input type="text" name="room_no"><br />
                <input type="submit" value="Register" name="submit" />

            </fieldset>
        </legend>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        if (
            !empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['cpass']) && !empty($_POST['stu_name'])
            && !empty($_POST['d_o_b']) && !empty($_POST['room_no'])
        ) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $stu_name = $_POST['stu_name'];
            $d_o_b = $_POST['d_o_b'];
            $room_no = $_POST['room_no'];
            require_once 'config.php';

            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
            $query = mysqli_query($con, "SELECT * FROM stu_info WHERE student_id='" . $user . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {
                //    $sql="INSERT INTO login(username,password) VALUES('$user','$pass')";  
                $sql1 = "INSERT INTO stu_info(student_id,student_name,date_of_birth,password,room_no) VALUES
	         ('$user','$stu_name','$d_o_b','$pass','$room_no')";

                $result = mysqli_query($con, $sql1);
                if ($result) {
                    echo "Account Successfully Created";
                } else {
                    echo "Failure!";
                }

            } else {
                echo "That username already exists! Please try again with another.";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>

    <p align="right"><a href="admin.php">click here to visit back </a></p>

</body>

</html>