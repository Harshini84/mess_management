<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "student") {
    header("location:index.php");
}
?>
<?php
require_once 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_SESSION['sess_user'];
    $message = $_POST["message"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO Feedback (student_id, `message`, rating) VALUES ('$student_id', '$message', $rating)";
    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->connect_error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .text-area {
            width: 300px;
            height: 100px;
        }

        .logout {
            position: absolute;
            top: 50px;
            right: 50px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ratingInput = document.getElementById("rating");
            var ratingStars = document.getElementById("ratingStars");

            function updateStars() {
                var rating = parseInt(ratingInput.value);
                var stars = '';
                for (var i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        stars += '<i class="fas fa-star"></i>'; // Full star
                    } else {
                        stars += '<i class="far fa-star"></i>'; // Empty star
                    }
                }
                ratingStars.innerHTML = stars;
            }

            // Update stars when rating input changes
            ratingInput.addEventListener("input", updateStars);

            // Initial update
            updateStars();
        });
    </script>

    <title>Feedback Form</title>
</head>

<body>
    <div class="logout">
        <form action="logout.php" method="post">
            <input type="submit" value="Log out">
        </form>
    </div>
    <center>
        <h1>MessMate</h1>
    </center>

    <center>
        <h2>Feedback Form</h2>
    </center>
    <center>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="message">Message:</label>
            <textarea name="message" class="text-area" id="message" required></textarea><br><br>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required><br><br>
            <div id="ratingStars"></div><br>
            <input type="submit" value="Submit">
        </form>
    </center>
    <?php
    if ($_SESSION['role'] == "mess_member") {
        echo "<p align='right'><a href='admin.php'>back to home page</a></p>";
    } else if ($_SESSION['role'] == "student") {
        echo "<p align='right'><a href='student_home.php'>back to home page</a></p>";
    }
    ?>
</body>

</html>