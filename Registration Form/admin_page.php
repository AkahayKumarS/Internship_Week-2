<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>

    <style>
      * {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
      }

      body {
        background-color: rgb(0, 0, 33);
        color: white;
        font-family: "Poppins", sans-serif;
      }
      nav {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80px;
        background-color: rgb(29, 29, 77);
      }
      nav .image img{
        width:4rem;
      }

      nav .heading h2{
        margin-left:30px;
        margin-right:400px;
      }
      nav ul {
        display: flex;
      }

      nav ul li {
        list-style: none;
        margin-right:40px;
      }

      nav ul li a {
        text-decoration: none;
        color: rgb(214, 205, 245);
        font-size:20px;
      }

      nav ul li a:hover {
        color: rgb(98, 185, 216);
      }

      .container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        margin-left:10rem;
        padding: 20px;
        padding-bottom: 60px;
      }

      .container .content {
        text-align: center;
        justify-content:space-around;
      }

      .container .content h3 {
        font-size: 30px;
        color: rgb(98, 185, 216);
      }

      .container .content h3 span {
        background: orange;
        color: rgb(0, 0, 33);
        border-radius: 5px;
        padding: 0 15px;
      }

      .container .content h1 {
        font-size: 50px;
        color: rgb(98, 185, 216);
      }

      .container .content h1 span {
        color: orange;
      }

      .container .content p {
        font-size: 25px;
        margin-bottom: 20px;
        color:rgb(98, 185, 216);
      }

      .container .content .btn {
        display: inline-block;
        padding: 10px 30px;
        font-size: 20px;
        background:rgb(132, 33, 199);
        color: #fff;
        border-radius:5px;
        margin: 0 5px;
        text-transform: capitalize;
      }

      .container .content .btn:hover {
        background: rgb(41, 199, 33);
        color:rgb(8, 38, 6);
      }
      .rightSection img {
            width: 35rem;
            height:20rem;
        }
      
    </style>
  </head>
  <body>
    <header>
      <nav>
        <div class="image">
          <img src="images/admin-img.png" alt="admin">
        </div>
        <div class="heading">
        <h2>Admin Page</h2>
        </div>
       
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
      <div class="content">
        <h3>hi, <span>admin</span></h3>
        <h1>
          welcome <span><?php echo $_SESSION['admin_name'] ?></span>
        </h1>
        <p>this is an admin page</p>
        <a href="register.php" class="btn">register</a>
        <a href="logout.php" class="btn">logout</a>
      </div>
      <div class="rightSection">
      <img src="images/log.svg" alt="Developer" />
    </div>
    </div>
  </body>
</html>
