<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result)>0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'Admin'){

         $_SESSION['admin_name'] = $row['fullName'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'User'){

         $_SESSION['user_name'] = $row['fullName'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

* {
  font-family: "Poppins", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
}
      
.form-container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  padding-bottom: 60px;
  position: relative;
  background:url("images/login-bg.jpg");
  background-size: cover;
}

.form-container form {
  padding: 20px;
  border-radius: 5px;
  box-shadow: 5px 5px 10px 5px rgb(201, 116, 224);
  background:rgb(43, 7, 53);
  text-align: center;
  width: 500px;
}

.form-container form h3 {
  font-size: 30px;
  text-transform: uppercase;
  margin-bottom: 10px;
  color: rgb(215, 163, 230);
}

.form-container form input,
.form-container form select {
  width: 100%;
  padding: 10px 15px;
  font-size: 17px;
  margin: 8px 0;
  background: rgb(237, 184, 240);
  border-radius: 5px;
}

.form-container form ::placeholder{
   color:rgb(35, 9, 36);
}
.form-container form select option {
  background: #fff;
}

.form-container form .form-btn {
  background: rgb(237, 30, 175);
  color: rgb(45, 5, 45);
  text-transform: capitalize;
  font-size: 20px;
  cursor: pointer;
  font-weight:400;
  width:10rem;
  padding:4px;
}

.form-container form .form-btn:hover {
  background: green;
  color: #fff;
}

.form-container form p {
  margin-top: 10px;
  font-size: 20px;
  color: rgb(163, 185, 230);
}

.form-container form p a {
  color: rgb(215, 163, 230);
}

.form-container form p a:hover{
color:crimson;
text-decoration:underline;
}
.form-container form .error-msg {
  margin: 10px 0;
  display: block;
  background: crimson;
  color: #fff;
  border-radius: 5px;
  font-size: 20px;
  padding: 10px;
}

</style>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="register.php">Register Now</a></p>
   </form>

</div>

</body>
</html>