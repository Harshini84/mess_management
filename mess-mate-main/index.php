<?php
session_start();
?>
<!doctype html>
<html>

<head>
    <title>MESS MANAGEMENT SYSTEM</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        h1 {
            color: indigo;
            font-family: verdana;
            font-size: 300%;
        }

        h3 {
            color: indigo;
            font-family: verdana;
            font-size: 150%;
        }

        button {
            background-color: #2899D1;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 25%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 12px 0 6px 0;
        }

        img.avatar {
            width: 20%;
            border-radius: 10%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

        }
    </style>
</head>

<body>

    <legend>
        <fieldset>

            <center>
                <h1>MESS MANAGEMENT SYSTEM</h1></br>
            </center>
            <center>
                <h3> Login </h3>
            </center>


            <form align="center" action="" method="post">
                <div class="container">
                    <input type="text" placeholder="email" name="user"><br />
                    <input type="password" placeholder="password" name="pass"><br />
                </div>

                <button type="submit" name="submit">Login </button>
        </fieldset>
    </legend>
    <p align="center"> <a href="sturegister.php">Student Register</a></p>
    <hr>
    <p align="center"> <a href="register_mess_member.php">Mess Member Register</a></p>
    </form>
    <?php
    if (isset($_POST["submit"])) {



        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            require_once 'config.php';

            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            $query1 = mysqli_query($con, "select * from mess_member where email_id = '" . $user . "' and password = '" . $pass . "' ");
            $numrows1 = mysqli_num_rows($query1);

            if ($numrows1 != 0) {
                $row = mysqli_fetch_assoc($query1);
                $email_id = $row['email_id'];
                $admin_password = $row['password'];
                $name = $row['member_name'];


                if ($user == $email_id && $pass == $admin_password) {
                    session_start();
                    $_SESSION['sess_user'] = $email_id;
                    $_SESSION['role'] = "mess_member";
                    $_SESSION['name'] = $name;

                    header("Location: admin.php");
                }

            }

            $query = mysqli_query($con, "SELECT * FROM stu_info WHERE email_id='" . $user . "' AND password ='" . $pass . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                $row = mysqli_fetch_assoc($query);
                $dbusername = $row['email_id'];
                $stu_id = $row['student_id'];
                $dbpassword = $row['password'];
                $name = $row['name'];

                if ($user == $dbusername && $pass == $dbpassword) {
                    session_start();
                    $_SESSION['sess_user'] = $stu_id;
                    $_SESSION['name'] = $name;
                    $_SESSION['role'] = "student";

                    /* Redirect browser */
                    header("Location: student_home.php");
                }
            } else {
                echo "Invalid username or password!";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>


</body>

</html>