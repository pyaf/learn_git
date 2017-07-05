<?php

session_start();
include_once 'config.php';

//set validation error flag as false
$error = false;

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . $password . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        $_SESSION['usr_email'] = $row['email'];
        $successmsg = "Login Successful!!!";
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
}

?>

<html>
<head>
<title>KY | Login</title>
<link rel="stylesheet" type="text/css" href="my_index.css" />
</head>
<body>
<div id="login">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div id="head_login">
      <p align="center">Login</p>
    </div>
    <div id="login_arrow"><a href="index.php" class="login_arrow"><span class="glyphicon glyphicon-arrow-left"></span></a></div></br></br></br></br></br>
    <div id="container_login">
      <label><p style="color: black; font: 35px bold san-sarif;">&nbsp&nbspE-mail</style></p></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      </br></br></br>
      <label><p style="color: black; font: 35px bold san-sarif;">&nbsp&nbspPassword</style></p></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      </br></br></br></br>
      <p style="color: rgb(100,100,100); font: 28px san-sarif;"><input type="checkbox" checked="checked">Remember me</p></br></br>
	  <p align="center"><button type="submit" class="btn btn-default" id="loginbtn" name="login">LOGIN</button></p>
          <p align="center" style="font: 35px bold san-sarif;"><span class="text-danger"><?php if (isset($successmsg)) { echo $successmsg; } ?></span></p>
          <p align="center" style="font: 35px bold san-sarif;"><span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span></p>
	  <p align="center" id="loginpageline1"><a href="#" id="forgot_password">Forgot password</a> | New user <a href="signup.php" id="loginpage_signup">Sign up</a></p>
	  <p align="center" id="loginpageline2">By signing up, you agree to KY's <a href="#" id="terms">Terms & Conditions</a> and <a href="#" id="privacy">Privacy Policy</a></p>
	</div>
  </form>
</div>
</body>
</html>