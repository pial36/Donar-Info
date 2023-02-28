<?php
error_reporting(0);

         
      if(isset($_POST['img_submit'])){
  
  $img_name=$_FILES['img_upload']['name'];
  $tmp_img_name=$_FILES['img_upload']['tmp_name'];
  $folder='upload/';
  move_uploaded_file($tmp_img_name,$folder.$img_name);
}
         // define variables and set to empty values
         $nameErr =""; $emailErr =""; $usernameErr =""; $passErr ="";
         $fname =""; 
         $lname ="";
         $email ="";
         $Username=""; 
         $password ="";
         $bio ="";

         
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["fname"])) {
               $nameErr = "Name is required";
            }

            else {
               $fname = ($_POST["fname"]);
               $lname = ($_POST["lname"]);

            }
            if (empty($_POST["Username"])) {
               $usernameErr = "Username is required";
            }

            else {
               $Username = ($_POST["Username"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }
            else {
               $email = ($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            if (empty($_POST["password"])) {
               $passErr = "Password is required";
            }

            else {
               $password = ($_POST["password"]);
            }
      
          }
      $myfile = fopen("newfile.txt","w")or die("unable to open");
             $txt = $_POST['fname'];
             fwrite ($myfile,$txt);
             $txt = $_POST['lname'];
             fwrite ($myfile,$txt.PHP_EOL);
             $txt = $_POST['Username'];
             fwrite ($myfile,$txt.PHP_EOL);
             $txt = $_POST['email'];
             fwrite ($myfile,$txt.PHP_EOL);
             $txt = $_POST["password"];
             fwrite ($myfile,$txt.PHP_EOL);
             $txt = $_POST['bio'];
             fwrite ($myfile,$txt);
             fclose($myfile);
            




//Database Connection
$servername = "localhost";
$username = "root";
$Password = "";
$dbname="registration form";
$conn = new mysqli($servername, $username, $Password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
        $sql ="INSERT INTO registration (Name, LastName, Username, Email, Password, Short_Bio )VALUE ('$fname','$lname','$Username','$email','$password','$bio')";
            $res = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['fname'])) {
        echo "Empty";
    } else {
        
      echo"Entries added!";
    }

   
}

      ?>
<!DOCTYPE html>     
<html>
<head>
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pial webtech</title>
    
   <form action='' method='POST' enctype='multipart/form-data' method = "post" action = "<?php 
         echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>"><style type="text/css">
		label{margin-left: 100px; width: 200px; display: inline-block;
			text-align: right;}
	</style>
         <fieldset>
      <legend><h1>Registration</h1></legend><br>
    
               <label>Name:</label>
               <span class = "error">*</span>
               <input type = "text" name="fname" placeholder="Enter your first Name"
               onfocus="this.placeholder=''" 
           onblur="this.placeholder='Enter your first Name'">

               <input type = "text" name="lname" placeholder="Enter your last Name"
               onfocus="this.placeholder=''" 
           onblur="this.placeholder='Enter your last Name'">

           <span class = "error"><?php echo $nameErr;?></span><br><br>
                <hr>
                <label>Username:</label>
               <span class = "error">*</span>
               <input type = "text" name="Username" placeholder="@username"
               onfocus="this.placeholder=''" 
           onblur="this.placeholder='@usaername'">
           <span class = "error"><?php echo $usernameErr;?></span><br><br>
           <hr>

               <label>E-mail:</label>
               <span class = "error">*</span> 
               <input type = "text" name="email" placeholder="example@mail.com"
               onfocus="this.placeholder=''" 
           onblur="this.placeholder='example@mail.com'">
                  <span class = "error"><?php echo $emailErr;?></span><br><br>
          <hr>
          <label> Password:</label>
          <span class = "error">*</span>
      <input type="password" name="password">
      <span class = "error"><?php echo $passErr;?></span><br><br>
      <hr>
      <label>Short Bio:</label>
      <textarea input type="text"name="bio" rows="4" cols="50"> </textarea> <br >Share a little Information about you. <br>
      <br>
      <hr>
      <label>Select logo:</label>
        <input type="file" name="img_upload">
        
      <hr>
        <label><input class="tk" type="Submit" name="img_submit" ></label>   
      
    </form>
    
    </body>
    </html>
  