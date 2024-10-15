
<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $username =$_POST['username'];
  $email =$_POST['email'];
  
  $password=$_POST['password'];
  $sql = "INSERT INTO signup(username,email,password) 
  VALUES('$username','$email','$password')";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo"Data entered successfully";
    header('location: login.php');
  }else{
    die(mysqli_error($conn));
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-comptible" content="IE=edge" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="login.css" />
  </head>

  <body>
    <div class="container">
      <div class="box form-box">
       <header>SIGN UP</header>
       <form action="sl.php" method="post">
        <div class="field input">
          <label for="username">Username</label>
          <input type="text" name="username" id="username"required>
        </div>
        <div class="field input">
            <label for="email">Email</label>
            <input type="text" name="email" id="email"required>
          </div>
        <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"required>
          </div>
        <div class="field input">
          <input type="submit" class="btn" name="submit" value="Sign up">
        </div>

        <div class="links">
          Already have an account? <a href="login.html">Login</a>
        </div>
       </form>
  </body>
</html>
