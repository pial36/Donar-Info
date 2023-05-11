<?php
require_once('db.php'); 
$conn=getConnection();

// Check if the user exists and the password is correct
$sql = "SELECT * FROM registration WHERE Username = '$Username' AND Pass = '$Password'";
$registration_result = $conn->query($sql);

$sql = "SELECT * FROM buyer WHERE Username = '$Username' AND Pass = '$Password'";
$buyer_result = $conn->query($sql);


$sql = "SELECT * FROM admin WHERE A_Username = '$Username' AND Password = '$Password'";
$admin_result = $conn->query($sql);


$sql = "SELECT * FROM agent WHERE AG_Username = '$Username' AND AG_Pass = '$Password'";
$agent_result = $conn->query($sql);







function insertRegistrationData($fname, $lname, $Username, $email, $Password, $bio, $user_type)
{
    global $conn;

    // Check for errors
    if (empty($fname) || empty($lname) || empty($Username) || empty($email) || empty($Password)) {
        return 'Please fill up all required fields';
    } else {
        // Insert the data into the database
        if ($user_type == "customer") {
            // Insert customer data into the registration table
            $sql_check = "SELECT * FROM registration WHERE Username = '$Username'";
            $result_check = $conn->query($sql_check);

            if ($result_check->num_rows > 0) {
                // Username already exists in registration table, display error message
                return 'Username already exists';
            } else {
                $sql = "INSERT INTO registration (First_name, Last_name, Username, Email, Pass, Bio) VALUES ('$fname','$lname','$Username','$email','$Password','$bio')";
                $registration_result = $conn->query($sql);
                return true;
            }
        } else {
            $sql_check = "SELECT * FROM buyer WHERE Username = '$Username'";
            $result_check = $conn->query($sql_check);

            if ($result_check->num_rows > 0) {
                // Username already exists in buyer table, display error message
                return 'Username already exists';
            } else {
                $sql = "INSERT INTO buyer (First_name, Last_name, Username, Email, Pass, Bio) VALUES ('$fname','$lname','$Username','$email','$Password','$bio')";
                $buyer_result = $conn->query($sql);
                return true;
            }
        }
    }
}




?>