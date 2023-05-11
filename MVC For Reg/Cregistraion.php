<?php
require_once ('../models/dbmodel.php');
require_once ('../views/Registration.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $Username = $_POST["Username"];
    $email = $_POST["email"];
    $Password = $_POST["Password"];
    $bio = $_POST["bio"];
    $user_type = isset($_POST["Customer"]) && $_POST["Customer"] == "buyer" ? "buyer" : "customer";

    // Insert registration data using the function from RegistrationModel.php
    $result = insertRegistrationData($fname, $lname, $Username, $email, $Password, $bio, $user_type);

    if ($result === true) {
        // Redirect the user to a success page
        header("Location: successfull.php");
        exit;
    } else {
        // Display error message
        echo '<span class="error">' . $result . '</span>';
    }
}
?>

