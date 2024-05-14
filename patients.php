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

    // Fetch patient data
    $sql = "SELECT * FROM patients";
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
        <a href="#" class="top">Sonitpur Pharmaceutical</a>
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Register</a>
            <a href="#">Admin</a>
            <a href="#">Login</a>
        </nav>

        <!-- <div id="menubtn" class="fas fa-bars"></div> -->
    </section>

    <!-- Main -->

    <section class="display">
        <h4>Patients Database</h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Username</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Condition</th>
                <!-- Add more columns as needed -->
            </tr>
            <?php
            // Loop through patient data and display it in a table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['condition'] . "</td>";
                // Add more columns as needed
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