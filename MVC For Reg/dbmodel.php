<?php
require_once('db.php'); 

function auth1($Username,$Password)
{
	$conn=getConnection();

// Check if the user exists and the password is correct
$sql = "SELECT * FROM registration WHERE Username = '$Username' AND Pass = '$Password'";
$result=mysqli_query($conn,$sql);
  $cout=mysqli_num_rows($result);
  if($cout==1)
  {
   return true;
  }
  else
  {
   return false;
  }
}
function auth2($Username,$Password)
{
	$conn=getConnection();

$sql = "SELECT * FROM buyer WHERE Username = '$Username' AND Pass = '$Password'";
$result=mysqli_query($conn,$sql);
  $cout=mysqli_num_rows($result);
  if($cout==1)
  {
   return true;
  }
  else
  {
   return false;
  }
}

function auth3($Username,$Password)
{
	$conn=getConnection();

$sql = "SELECT * FROM admin WHERE A_Username = '$Username' AND Password = '$Password'";
$result=mysqli_query($conn,$sql);
  $cout=mysqli_num_rows($result);
  if($cout==1)
  {
   return true;
  }
  else
  {
   return false;
  }
}
function auth4($Username,$Password)
{
	$conn=getConnection();

$sql = "SELECT * FROM agent WHERE AG_Username = '$Username' AND AG_Pass = '$Password'";
$result=mysqli_query($conn,$sql);
  $cout=mysqli_num_rows($result);
  if($cout==1)
  {
   return true;
  }
  else
  {
   return false;
  }
}







function insertRegistrationData($fname, $lname, $Username, $email, $Password, $bio, $user_type)
{
    $conn=getConnection();

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