<?php
require_once '../Models/User.php';
require_once '../Models/PrepaidCard.php';
require_once '../Models/Database.php';
include 'header.php';
$db = new Database();
$user = new User();
$card = new PrepaidCard();

$cardnums = $card->cardNums(); 
$message = "";
$done = "";
if(isset($_POST["add"])){
  $option = $_POST["prepaidcard"];
  $cardnumber = $_POST["cardnumber"];
  $cardpassword = $_POST["cardpassword"];
  $cvv = $_POST["Cvv"];

  $query = "SELECT CVV FROM usercards";
  $result = $db->query($query);
  $found = false;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          if($cvv == $row["CVV"]){
            $found = true;
            break;
          }
      }
      if(!$found){
        if($cardnums != 2){
          $user->addPrepaidCard($option,$cardnumber,$cardpassword,$cvv);
          $done = "Your Card Is Added";
        }
        else{
          $message = "Max limit of cards is 2 and you have already 2 cards";
        }
         
      }
      else{
        $message = "This CVV is already used";
      }
  } 
}

?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->  
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Navigation Bar With Scroll Every Section</title>
  <link rel="stylesheet" href="style.css">
  <!-- Fontawesome CDN Link -->
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

/* Container */
.square-container {
  width: 300px;
  margin: 200px auto;
  display: flex; /* Add flexbox */
  flex-direction: column; /* Arrange items vertically */
}

/* Headers */
.SpeedyPay-Header {
  text-align: center;
  position: relative;
  top:-50px;
}

/* Radio buttons container */
.SpeedyPay-Options {
  display: flex; /* Use flexbox */
  justify-content: space-between; /* Distribute items evenly */
  margin-bottom: 10px; /* Add space below */
}

/* Radio buttons */
input[type="radio"] {
  margin-right: 5px;
}

/* Card Number and Password input fields */
.card-number,
.card-password,
.cvv {
  margin-bottom: 10px;
}

/* Labels */
label {
  display: block;
  margin-bottom: 5px;
}

/* Input fields */
input[type="text"],
input[type="password"],
input[type="number"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Add button */
.Add-Button {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Add button hover effect */
.Add-Button:hover {
  background-color: #45a049;
}
.msg{
  color: red;
}
.dn{
  color: #45a049;
}

  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<!-- The Prepaid Cards inputs -->
<form action="" method="post">
<div class="square-container">
  <h1 class="SpeedyPay-Header">SpeedyPay</h1>
  <div class="SpeedyPay-Options">
    <div class="visa">
      <label for="visa"> Visa </label>
      <input type="radio" value="visa" name="prepaidcard" required>
    </div>
    <div class="Paypal">
      <label for="Paypal"> Paypal </label>
      <input type="radio" value="paypal" name="prepaidcard" required>
    </div>
    <div class="Credit-card">
      <label for="Credit Card"> Credit Card </label>
      <input type="radio" value="credit card" name="prepaidcard" required>
    </div>
  </div>
  <div class="card-number">
    <label for="cardnumber">Card Number</label>
    <input type="text" name="cardnumber" class="cardnumber-input" placeholder="CardNumber" required>
  </div>

  <div class="card-password">
    <label for="cardpassword">Card Password</label>
    <input type="password" name="cardpassword" class="cardpassword-input" placeholder="CardPassword" required>
  </div>

  <div class="cvv">
    <label for="Cvv">Cvv</label>
    <input type="password" name="Cvv" class="cvv-input" placeholder="Cvv" maxlength="4" pattern="\d{4}" title="Please enter exactly 4 digits" required>
  </div>
  <div class="msg"><?=$message?></div>
  <div class="dn"><?=$done?></div>
  <button type="submit" name="add" class="Add-Button">Add</button>
</div>
</form>

</div>
<div class="button">

  <a href="index.php"><i class="fas fa-arrow-up"></i></a>
</div>
</body>
</html>