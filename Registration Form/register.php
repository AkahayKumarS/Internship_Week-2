<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = $_POST['phone'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(fullName, username, email, phone, password, user_type) VALUES('$fullName','$username','$email','$phone','$pass','$user_type')";
         mysqli_query($conn, $insert);
         $success = "Your account has been created successfully!";
      }
   }

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registration Form</title>
    <meta
      name="viewport"
      content="width=device-width,
      initial-scale=1.0"
    />
    <link rel="stylesheet" href="style.css" />
    <style>
       @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

      * {
        padding: 0;
        font-family: "Poppins", sans-serif;
        margin: 0;
        box-sizing: border-box;
        font-family: sans-serif;
      }

      body {
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        background: url("images/registration-bg.jpg");
        background-size: cover;
      }

      .container {
        background:rgb(7, 7, 71);
        width: 100%;
        max-width: 650px;
        padding: 28px;
        margin: 0 28px;
        border-radius: 10px;
        box-shadow: 2px 2px 10px 5px lightblue;
      }

      .form-title {
        font-size: 26px;
        font-weight: 600;
        text-align: center;
        padding-bottom: 6px;
        color: lightblue;
        text-shadow: 2px 2px 2px rgb(73, 73, 225);
        border-bottom: solid 1px white;
      }

      .main-user-info {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px 0;
      }

      .user-input-box:nth-child(2n) {
        justify-content: end;
      }

      .user-input-box {
        display: flex;
        flex-wrap: wrap;
        width: 50%;
        padding-bottom: 15px;
      }

      .user-input-box label {
        width: 95%;
        color: white;
        font-size: 20px;
        font-weight: 400;
        margin: 3px 0;
      }

      .user-input-box input {
        height: 40px;
        width: 95%;
        border-radius: 7px;
        outline: none;
        border: 1px solid grey;
        padding: 0 10px;
        background: rgb(123, 159, 200);
      }

      .user-input-box ::placeholder {
        color: rgb(4, 4, 45);
      }

      .form-submit-btn input {
        cursor: pointer;
      }

      .form-submit-btn {
        margin-top: 5px;
      }

      .form-submit-btn input {
        display: block;
        width: 100%;
        margin-top: 10px;
        font-size: 20px;
        padding: 8px;
        border: none;
        border-radius: 3px;
        color: rgb(209, 209, 209);
        background: rgb(5, 125, 25);
      }

      .form-submit-btn input:hover {
        background:rgb(112, 224, 13);
        color:rgb(23, 43, 3);
      }

      .container form .error-msg {
        margin: 10px 0;
        display: block;
        background: rgb(241, 167, 182);
        color:#851923;
        border-radius: 5px;
        border: 2px solid red;
        font-size: 20px;
        padding: 8px;
        text-align:center;
      }
      .container form .success-msg {
        margin: 10px 0;
        display: block;
        background: rgb(143, 232, 167);
        color:green;
        border-radius: 5px;
        border: 2px solid green;
        font-size: 20px;
        padding: 8px;
        text-align:center;
      }

      .container form .user-type{
        margin-top:0rem;
      }

      .container form .user-type label{
        color:white;
        font-size: 20px;
      }

      .container form .user-type select {
        width: 35%;
        padding: 8px 15px;
        font-size: 17px;
        margin: 8px 0;
        background: #eee;
        border-radius: 5px;
      }

      .container form .user-type select option {
        background: #fff;
      }
      
      .form-submit-btn p{
        margin-top:1rem;
        font-size: 1.2rem;
        color:white;
      }

      .form-submit-btn p a{
        text-decoration:none;
        color:lightblue;
      }

      .form-submit-btn p a:hover{
        color:red;
        text-decoration:underline;
      }

      @media (max-width: 600px) {
        .container {
          min-width: 280px;
        }

        .user-input-box {
          margin-bottom: 12px;
          width: 100%;
        }

        .user-input-box:nth-child(2n) {
          justify-content: space-between;
        }

        .main-user-info {
          max-height: 380px;
          overflow: auto;
        }

        .main-user-info::-webkit-scrollbar {
          width: 0;
        }
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="" method="post">
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      }
      elseif(isset($success)){
          echo '<span class="success-msg">'.$success.'</span>';
      }
      ?>
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input
              class="label"
              type="text"
              id="fullName"
              name="fullName"
              placeholder="Enter Full Name"
              required
            />
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input
            class="label"
              type="text"
              id="username"
              name="username"
              placeholder="Enter Username"
              required
            />
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input
            class="label"
              type="email"
              id="email"
              name="email"
              placeholder="Enter Email"
              required
            />
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Phone Number</label>
            <input
            class="label"
              type="text"
              id="phoneNumber"
              name="phone"
              placeholder="Enter Phone Number"
              required
              pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Enter 10 digit Phone Number')" oninput="this.setCustomValidity('')"
            />
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input
            class="label"
              type="password"
              id="password"
              name="password"
              placeholder="Enter Password"
              required
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="this.setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')" oninput="this.setCustomValidity('')"
            />
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input
            class="label"
              type="password"
              id="confirmPassword"
              name="cpassword"
              placeholder="Confirm Password"
              required
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="this.setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')" oninput="this.setCustomValidity('')"
            />
          </div>
        </div>
       
        <div class="user-type">
          <label for="user_type">Select User Type</label>
          <select name="user_type" id="user_type">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
          </select>
        </div>
        <div class="form-submit-btn">
          <input type="submit" name="submit" value="Register Now" onclick="myAlert()"/>
          <p>Already have an account? <a href="login_form.php">Login Now</a></p>
        </div>
      </form>
    </div>

    <script>
      function myAlert(){
        confirm("Are you sure want to submit?");
      }
    </script>
  </body>
</html>