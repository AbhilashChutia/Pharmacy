<?php
    session_start();
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pharmacy";

    $connection = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id,`name`,age,medicine,quantity FROM patients JOIN inventory on patients.id = inventory.user_id";
    $result = mysqli_query($connection, $sql);
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
        <a href="home.html" class="top">Sonitpur Pharmaceutical</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="register.php">Register</a>
            <a href="admin.php">Admin</a>
            <a href="login.php">Login</a>
        </nav>

    </section>

    <!-- Main -->

    <section class="display">
        <h4>Patients Database</h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Medicine</th>
                <th>Quantity</th>
            </tr>
            <?php
            // Loop through patient data and display it in a table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['medicine'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div class="logout">
            <a href="logout.php">Logout</a>
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