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
        <h1>REGISTER AN MESS MEMBER</h1>
    </center>

    <center>
        <h2>Registration Form</h2>
    </center>
    <form action="" method="POST">
        <legend>
            <fieldset>

                Mess Member id : <input type="text" name="user"><br />
                Mess Member name : <input type="text" name="name"><br />
                date of birth : <input type="date" name="d_o_b"><br />
                email_id : <input type="email" name="email_id"><br />
                phone no : <input type="text" name="phone_no"><br />
                <input type="submit" value="Register" name="submit" />

            </fieldset>
        </legend>
    </form>
    <?php
    if (isset($_POST["submit"])) { // echo "hii";
        if (
            !empty($_POST['user'])  && !empty($_POST['name']) && !empty($_POST['email_id'])
            && !empty($_POST['d_o_b']) && !empty($_POST['phone_no'])
        ) {
            $user = $_POST['user'];
            $name = $_POST['name'];
            $d_o_b = $_POST['d_o_b'];
            $email_id = $_POST['email_id'];
            $phone_no = $_POST['phone_no'];
            require_once 'config.php';

            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
    
            $query = mysqli_query($con, "SELECT * FROM mess_member WHERE emp_id='" . $user . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {    //echo "hello";
                $sql1 = "INSERT INTO mess_member(emp_id,member_name,date_of_birth,email_id,phone_no) VALUES
	         ('$user','$name','$d_o_b','$email_id','$phone_no')";

                $result = mysqli_query($con, $sql1);
                if ($result) {
                    echo "Mess Member details have been successfully registered.";
                    header("Location: admin.php");
                } else {
                    echo "Failure!";
                }

            } else {
                echo "That employee_id already exists! Please enter a new id.";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>

    <p align="right"><a href="index.php">click here to login </a></p>

</body>

</html>