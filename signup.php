<?php

include_once 'config.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $cpassword = mysqli_real_escape_string($mysqli, $_POST['cpassword']);
    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if(mysqli_query($mysqli, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . $password . "')")) {
            $successmsg = "Successfully Registered! go to Login";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}

?>

<html>
<head>
<title>KY | Signup</title>
<link rel="stylesheet" type="text/css" href="my_index.css" />
</head>
<body>
<div id="signup">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div id="head_signup">
      <p align="center">Signup</p>
    </div>
    <div id="signup_arrow"><a href="index.php" class="signup_arrow"><span class="glyphicon glyphicon-arrow-left"></span></a></div></br></br></br></br></br>
    <div id="container_login">
      <label><p style="color: black; font: 35px bold san-sarif;">&nbsp&nbspName</style></p></label><span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span></br>
      <input type="text" placeholder="Enter Name" name="name" required>
      </br></br></br>
      <label><p style="color: black; font: 35px bold san-sarif;">&nbsp&nbspE-mail</style></p></label><span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span></br>
      <input type="text" placeholder="Enter Email" name="email" required>
      </br></br></br>
      <label><p style="color: black; font: 35px bold san-sarif;">&nbsp&nbspPassword</style></p></label><span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span></br>
      <input type="password" placeholder="Enter Password" name="password" required>
      </br></br></br>
      <label><p style="color: black; font: 35px bold san-sarif;">&nbsp&nbspConfirm Password</style></p></label><span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span></br>
      <input type="password" placeholder="Enter Confirm Password" name="cpassword" required>
      </br></br></br></br>
	  <p align="center"><button type="submit" class="btn btn-default" id="signupbtn" name="signup">SIGNUP</button></p>
          <p align="center" style="font: 35px bold san-sarif;"><span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span></p>
          <p align="center" style="font: 35px bold san-sarif;"><span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span></p>
	  <p align="center" id="signuppageline1">Already user <a href="login.php" id="signuppage_signup">Login</a></p>
	  <p align="center" id="signuppageline2">By signing up, you agree to KY's <a href="#" id="terms">Terms & Conditions</a> and <a href="#" id="privacy">Privacy Policy</a></p>
    </div>
  </form>
</div>
</body>
</html>