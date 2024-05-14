<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pharmacy";

$connection = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $condition = $_POST['condition'];
   
    $request = "INSERT INTO `patients` (`name`, `age`, `username`, `password`, `gender`, `condition`) VALUES ('$name', '$age', '$username', '$password', '$gender', '$condition');";

    if ($connection->query($request) == true) {
        $insert = true;
    } else {
        echo "ERROR: sql <br> $connection->error";
    };

    // Close the database connection

    $connection->close();

    header('Location: home.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonitpur Pharmaceutical</title>

    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>

    <!-- Header -->

    <section class="header">
        <a href="home.php" class="top">Sonitpur Pharmaceutical</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="register.php">Register</a>
            <a href="admin.php">Admin</a>
            <a href="login.php">Login</a>
        </nav>

        <!-- <div id="menubtn" class="fas fa-bars"></div> -->
    </section>

    <!-- Main -->

    <section class="home">
        <div class="first">
            <!-- <div class="content">
                <span>Health is wealth, invest wisely!</span>
                <h3>Welcome to Sonitpur Medical</h3>
                <a href="academics.php" class="btn">Discover More</a>
            </div> -->

            <section class="patient-register">
                <h4>Patient Register</h4>
                <form action="register.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required><br><br>

                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="password">Password:</label>
                    <input type="text" id="password" name="password" required><br><br>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br><br>

                    <label for="condition">Condition:</label><br>
                    <textarea id="condition" name="condition" rows="4" cols="50" required></textarea><br><br>

                    <input type="submit" name="submit" value="Register">
                </form>
            </section>
        </div>
    </section>

    <!-- Footer -->

    <section class="footer">
        <div class="container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="home.php"><i class="fas fa-angle-right"></i>Home</a>
                <a href="academics.php"><i class="fas fa-angle-right"></i>About US</a>
                <a href="admission.php"><i class="fas fa-angle-right"></i>Catalogue</a>
                <a href="register.php"><i class="fas fa-angle-right"></i>Register</a>
                <a href="login.php"><i class="fas fa-angle-right"></i>Login</a>
            </div>
            <div class="box">
                <h3>Queries</h3>
                <a href="#">
                    <i class="fas fa-angle-right"></i>Ask Questions
                </a>
                <a href="#"><i class="fas fa-angle-right"></i>Technical</a>
                <a href="#"><i class="fas fa-angle-right"></i>Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i>Terms of Service</a>
                <a href="#"><i class="fas fa-angle-right"></i>About Us</a>
            </div>
            <div class="box">
                <h3>Contact Us</h3>
                <a href="#"><i class="fas fa-phone"></i>+91 9187654321</a>
                <a href="#"><i class="fas fa-phone"></i>+123 456 78900</a>
                <a href="#"><i class="fas fa-envelope"></i>sonitpurpharma@rediffmail.com</a>
                <a href="#"><i class="fas fa-envelope"></i>pharmasonitpur@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i>Tezpur</a>
            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <a href="#"><i class="fab fa-facebook"></i>facebook</a>
                <a href="#"><i class="fab fa-twitter"></i>twitter</a>
                <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
                <a href="#"><i class="fab fa-whatsapp"></i>whatsapp</a>
                <a href="#"><i class="fab fa-telegram"></i>telegram</a>
            </div>
        </div>
        <div class="credit">
            <div>
                &copy; <span>Sonitpur Pharmaceutical</span>, All Rights Reserved
            </div>
            <div>Developed by <span>Abhilash | Bishal | Abhinab</span></div>
        </div>
    </section>


</body>

</html>