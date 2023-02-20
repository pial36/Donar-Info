<html>
<head>
  <title>Pial webtech</title>

  <?php



     
         $nameErr =""; $emailErr ="";
         $name =""; $email ="";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "*Name is required";
            }

            else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "*Email is required";
            }
            else {
               //$email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }

            }
          }

     
      ?>
</head>
  <body>
   <form method = "post" action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         
         <fieldset>

<legend><h1 style="color:red;">REGISTRATION</h1></legend><br>

<label for ="fname"> First Name: *</label>
<input type ="text" name="fname"placeholder="Enter First name"> 
<span class = "error"> <?php echo $nameErr;?></span><br><hr>

<label for ="em">Email: *</label>
<input type ="email" name="em" placeholder="Enter Your Email"> <span class = "error"> <?php echo $emailErr;?></span><br><hr>

<label for ="pass">Password: </label>
<input type ="password" name="pass"placeholder="Enter Your Password"><br><hr> 

<label for ="pass">Your Logo: </label>
<input type ="file" name ="fileUpload" id = file"fileUpload"><br><hr>


<input type="Submit">

</fieldset>

    </form>
    </body>
    </html>
	
	
	
	
	
	

	
	
	
	
	
	
	
