<?php
  require_once '../Models/UserInformation.php';
  require_once '../Models/DigitalWallet.php';
  session_start();
  $userinfo = new UserInformation();
  $wallet = new DigitalWallet();
  $balanceW = $wallet->getBalance();
  $name = $userinfo->getName();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <style>
* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    nav {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 75px;
       background: #272727; /*#2980b9 */
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    nav .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 100%;
      max-width: 90%;
      background: #272727; /*#2980b9*/
      margin: auto;
    }

    nav .navbar .logo a {
      color: #fff;
      font-size: 27px;
      font-weight: 600;
      text-decoration: none;
    }

    nav .navbar .menu {
      display: flex;
    }

    .navbar .menu li {
      list-style: none;
      margin: 0 15px;
    }

    .navbar .menu li a {
      color: #fff;
      font-size: 17px;
      font-weight: 500;
      text-decoration: none;
    }

    section {
      display: flex;
      height: 100vh;
      width: 100%;
      align-items: center;
      justify-content: center;
      color: gray; /*#96c7e8*/
      font-size: 70px;
    }

    .button a {
      position: fixed;
      bottom: 20px;
      right: 20px;
      color: #fff;
      background: gray; /*#2980b9*/
      padding: 7px 12px;
      font-size: 18px;
      border-radius: 6px;
      box-shadow: rgba(0, 0, 0, 0.15);
    }

    .wrapper {
      height: 100%;
      width: 300px;
      position: relative;
    }

    .wrapper .menu-btn {
      position: absolute;
      font-size: 30px;
      left: 20px;
      top: 10px;
      background: transparent ; /*#4a4a4a*/
      color: #fff; 
      height: 45px;
      width: 45px;
      z-index: 9999;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    #btn:checked~.menu-btn {
      left: 247px;
    }

    .wrapper .menu-btn i {
      position: absolute;
      font-size: 23px;
      transition: all 0.3s ease;
    }

    .wrapper .menu-btn i.fa-times {
      opacity: 0;
    }

    #btn:checked~.menu-btn i.fa-times {
      opacity: 1;
      transform: rotate(-180deg);
    }

    #btn:checked~.menu-btn i.fa-bars {
      opacity: 0;
      transform: rotate(180deg);
    }

    #sidebar {
      position: fixed;
       background: #404040; 
      height: 100%;
      width: 270px;
      z-index: 1000;
      overflow: hidden;
      left: -270px;
      transition: all 0.3s ease;
    }

    #btn:checked~#sidebar {
      left: 0;
      z-index: 1000;
    }
    .wrapper{
        position: relative;
        right: 95px;
        bottom: 20px;
    }

    #sidebar .title {
      line-height: 65px;
      text-align: center;
      background: #333;
      font-size: 25px;
      font-weight: 600;
      color: #f2f2f2;
      border-bottom: 1px solid #222;
    }

    #sidebar .list-items {
      position: relative;
      background: #404040;
      width: 100%;
      height: 100%;
      list-style: none;
    }

    #sidebar .list-items li {
      padding-left: 40px;
      line-height: 50px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      border-bottom: 1px solid #333;
      transition: all 0.3s ease;
    }

    #sidebar .list-items li:hover {
      border-top: 1px solid transparent;
      border-bottom: 1px solid transparent;
      box-shadow: 0 0px 10px 3px #222;
    }

    #sidebar .list-items li:first-child {
      border-top: none;
    }

    #sidebar .list-items li a {
      color: #f2f2f2;
      text-decoration: none;
      font-size: 18px;
      font-weight: 500;
      height: 100%;
      width: 100%;
      display: block;
    }

    #sidebar .list-items li a i {
      margin-right: 20px;
    }

    #sidebar .list-items .icons {
      width: 100%;
      height: 40px;
      text-align: center;
      position: absolute;
      bottom: 100px;
      line-height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #sidebar .list-items .icons a {
      height: 100%;
      width: 40px;
      display: block;
      margin: 0 5px;
      font-size: 18px;
      color: #f2f2f2;
      background: #4a4a4a;
      border-radius: 5px;
      border: 1px solid #383838;
      transition: all 0.3s ease;
    }

    #sidebar .list-items .icons a:hover {
      background: #404040;
    }

    .list-items .icons a:first-child {
      margin-left: 0px;
    }

    .content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #202020;
      z-index: -1;
      width: 100%;
      text-align: center;
    }

    .content .header {
      font-size: 45px;
      font-weight: 700;
    }

    .content p {
      font-size: 40px;
      font-weight: 700;
    }
    .balancew{
      color: white;
      background: #2e6e31;
      padding: 8px;
      border-radius: 20px;
      margin-left: 30px;
    }

</style>
</head>
<body>
<nav>
  <div class="navbar">
    <div class="logo">
    <div class="wrapper">
  <input type="checkbox" id="btn" hidden>
  <label for="btn" class="menu-btn">☰</label>
  <nav id="sidebar">
    <div class="title">Side Menu</div>
    <ul class="list-items">
      <li><a href="account.php"><i class="fas fa-home"></i>Account</a></li>
      <li><a href="chargewallet.php"><i class="fas fa-sliders-h"></i>MyWallet</a></li>
      <li><a href="deletecard.php"><i class="fas fa-address-book"></i>Delete Card</a></li>
      <li><a href="request.php"><i class="fas fa-cog"></i>Requests</a></li>
      <li><a href="history.php"><i class="fas fa-globe-asia"></i>History</a></li>
      <li><a href="Register.php"><i class="fas fa-envelope"></i>Log out</a></li>
      <div class="icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-github"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </ul>
  </nav>
</div>
        <a href="index.php">SpeedyPay</a> &nbsp;&nbsp;<span class="balancew">Balance : <?=$balanceW?>$</span>

    </div>
    <ul class="menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="mail.php">Mail</a></li>
      <li><a href="contactus.php">Contact</a></li>
      <li><a href="Help.php">Help</a></li>
    </ul>
  </div>
</nav>
</body>
</html>