<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: home.php");
        exit;
    }

    $dbservername = "localhost";
    $dbusername = "root"; 
    $dbpassword = ""; 
    $dbname = "pharmacy";

    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_SESSION['id'];

        if (isset($_POST["medicine"]) && isset($_POST["quantity"])) {
            $medicines = $_POST["medicine"];
            $quantities = $_POST["quantity"];

            for ($i = 0; $i < count($medicines); $i++) {
                $medicine = $medicines[$i];
                $quantity = $quantities[$i];

                $existingMedicineQuery = "SELECT * FROM inventory WHERE user_id = '$user_id' AND medicine = '$medicine'";
                $result = mysqli_query($conn, $existingMedicineQuery);
                if (mysqli_num_rows($result) > 0) {

                    $row = mysqli_fetch_assoc($result);
                    $existingQuantity = $row['quantity'];
                    $newQuantity = $existingQuantity + $quantity;
                    $updateQuery = "UPDATE inventory SET quantity = '$newQuantity' WHERE user_id = '$user_id' AND medicine = '$medicine'";
                    mysqli_query($conn, $updateQuery);
                } else {
                    $insertQuery = "INSERT INTO inventory (user_id, medicine, quantity) VALUES ('$user_id', '$medicine', '$quantity')";
                    mysqli_query($conn, $insertQuery);
                }
            }

            echo "Medicines added successfully.";
        }
    }

    $conn->close();
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

    <section class="home">
        <div class="container">
            <h4>Medicine Inventory</h4>
            <form action="customerpanel.php" method="post" id="medicineForm">
                <div id="medicineInputs">
                    <div class="medicineInput">
                        <label for="medicine">Select Medicine:</label>
                        <select name="medicine[]" class="medicine">
                            <option value="Amoxicillin">Amoxicillin</option>
                            <option value="Paracetamol">Paracetamol</option>
                            <option value="Aspirin">Aspirin</option>
                            <option value="Morphine">Morphine</option>
                            <option value="Penicillin">Penicillin</option>
                            <option value="Insulin">Insulin</option>
                            <option value="Lanoxin">Lanoxin </option>
                        </select>
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity[]" class="quantity" min="1">
                        <button type="button" class="removeMedicine">Remove</button>
                    </div>
                </div>
                <button type="button" id="addMedicine">Add Medicine</button>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
        <script src="script.js"></script>
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