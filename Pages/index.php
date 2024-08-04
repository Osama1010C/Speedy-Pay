<?php

 require_once '../Models/UserInformation.php';
 require_once '../Models/User.php';
 
include 'header.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        
        html {
  background: #f5f7f8;
  font-family: system-ui;
  -webkit-font-smoothing: antialiased;
  padding: 20px 0;
  margin-top: 60px;
}
body{
  margin-top: 110px;
}

header {
  width: 90%;
  max-width: 1240px;
  margin: 0 auto;
}
.band {
  width: 90%;
  max-width: 1240px;
  margin: 0 auto;
  
  display: grid;
  
  grid-template-columns: 1fr;
  grid-template-rows: auto;
  grid-gap: 20px;
  
  @media (min-width: 30em) {
    grid-template-columns: 1fr 1fr;
  }
  
  @media (min-width: 60em) {
    grid-template-columns: repeat(4, 1fr);
  }
}

.card {
  background: white;
  text-decoration: none;
  color: #444;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  min-height: 100%;
  
  /* // sets up hover state */
  position: relative;
  top: 0;
  transition: all .1s ease-in;
    
  &:hover {
    top: -2px;
    box-shadow: 0 4px 5px rgba(0,0,0,0.2);
  }
  
  article {
    padding: 20px;
    flex: 1;
    
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  
  h1 {
    font-size: 20px;
    margin: 0;
    color: #333;
  }
  
  p {
    flex: 1;
    line-height: 1.4;
  }
  
  span {
    font-size: 12px;
    font-weight: bold;
    color: #999;
    text-transform: uppercase;
    letter-spacing: .05em;
    margin: 2em 0 0 0;
  }
  
  .thumb {
    padding-bottom: 60%;
    background-size: cover;
    background-position: center center;
  }
}

.item-1 {
  @media (min-width: 60em) {
    grid-column: 1 / span 2;
    
    h1 {
      font-size: 24px;
    }
  }
}
    </style>
</head>
<body>
<header>
  <h1>Welcome <?=$name?></h1>
</header>
<div class="band">
  <div class="item-1">
    <a href="account.php" class="card">
      <div class="thumb" style="background-image: url(../imgs/ben-sweet-2LowviVHZ-E-unsplash.jpg);"></div>
      <article>
        <h1>My Account</h1>
        <span>you can edit your account, show your cards and add prepaid card or bank account</span>
      </article>
    </a>
  </div>
  <div class="item-2">
    <a href="Transfer_RequestMoney.php" class="card">
      <div class="thumb" style="background-image: url(../imgs/users-2.png);"></div>
      <article>
        <h1>Transfer Money To User</h1>
        <span>send some money to your friends</span>
      </article>
    </a>
  </div>
  <div class="item-3">
    <a href="chargewallet.php" class="card">
      <div class="thumb" style="background-image: url(../imgs/6209522.jpg);"></div>
      <article>
        <h1>Charge your Wallet</h1>
        <p>you can charge your digital wallet by using your prepaid card or your bank account </p>
        <span>Charge it now</span>
      </article>
    </a>
  </div>
  <div class="item-4">
    <a href="history.php" class="card">
      <div class="thumb" style="background-image: url(../imgs/2109.i607.018.S.m012.c12.fintech\ isometric\ icons.jpg);"></div>
      <article>
        <h1>History</h1>
        <p>show your last activities and transactions</p>
        
      </article>
    </a>
  </div>
  <div class="item-5">
    <a href="AddPrepaidCard.php" class="card">
      <div class="thumb" style="background-image: url(../imgs/prepaidcrad.jpg);"></div>
      <article>
        <h1>Add Prepaid Card</h1>
        <span>Add new Prepaid card</span>
      </article>
    </a>
  </div>
  <div class="item-6">
    <a href="AddBankAccount.php" class="card">
      <div class="thumb" style="background-image: url(../imgs/bankcard.jpg);"></div>
      <article>
        <h1>Add Bank Account</h1>

        <span>Add new Bank account</span>
      </article>
    </a>
  </div>
  <div class="item-7">
    <a href="contactus.php" class="card">
      <div class="thumb" style="background-image: url(../imgs/markus-winkler-q3QPw37J6Xs-unsplash.jpg);"></div>
      <article>
        <h1>Contact us</h1>
        <span>contact our customer sevices if any problem</span>
      </article>
    </a>
  </div>
</div>
</body>
</html>


<?php
include 'footer.php';
?>