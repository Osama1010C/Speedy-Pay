<?php

require_once '../Models/Database.php';

$db = new Database();

//to add a new whole row

// $query = "INSERT INTO users (IPA, username, email, userpassword, age, phone_number, digital_wallet_balance) VALUES (411, 'dani', 'dani@gmail.com', '3213311', 22, '011430231', 0);";
// $Result = $db->query($query);
// if($Result){
//     echo "registered succesfully";
// }
// else{
//     echo "ERROR !";
// }


//to update an on info

// $query = "UPDATE users SET username = 'osama' WHERE IPA =438";
// $Result = $db->query($query);
// if($Result){
//     echo "Updated succesfully";
// }
// else{
//     echo "ERROR !";
// }

 // print the whole row

// $query = "SELECT * FROM users WHERE IPA = 438";
// $result = $db->query($query);
// if ($result->num_rows > 0) {
//     // Output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "IPA: " . $row["IPA"] . "<br>";
//         echo "name: " . $row["username"] . "<br>";
//         echo "email: " . $row["email"] . "<br>";
//         echo "password: " . $row["userpassword"] . "<br>";
//         echo "age: " . $row["age"] . "<br>";
//         echo "phone: " . $row["phone_number"] . "<br>";
//         echo "digital wallet balance: " . $row["digital_wallet_balance"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }


// select a specific data

// $query = "SELECT digital_wallet_balance FROM users WHERE IPA = 438";
// $result = $db->query($query);
// if ($result->num_rows > 0) {
//     // Output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "digital wallet balance: " . $row["digital_wallet_balance"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }



//to select a specific data then update it

// $query = "SELECT digital_wallet_balance FROM users WHERE IPA = 438";
// $result = $db->query($query);
// if ($result->num_rows > 0) {
//     $value = 0;
//     // Output data of each row
//     while($row = $result->fetch_assoc()) {
//         $value =  $row["digital_wallet_balance"];
//     }
//     $value+=220;
//     $query = "UPDATE users SET digital_wallet_balance = $value WHERE IPA =438";
//     $result = $db->query($query);
//     if($result)
//         echo "done";
//     else
//         echo "nooooooo";
// } else {
//     echo "0 results";
// }


require_once "../Models/User.php";
require_once "../Models/UserInformation.php";
require_once "../Models/DigitalWallet.php";
require_once "../Models/BankAccount.php";
require_once "../Models/PrepaidCard.php";
require_once "../Models/Admin.php";









$user = new User();
$userinfo = new UserInformation();
$wallet = new DigitalWallet();
$bankcard = new BankAccount();
$card = new PrepaidCard();
$admin = new Admin();

session_start();


//TRY USERINFOMATION CLASS//
//========================//

// $name = $userinfo->getName();
// echo $name . "<br>";

// $age = $userinfo->getAge();
// echo $age . "<br>";

// $phone = $userinfo->getPhoneNumber();
// echo $phone . "<br>";

// $pass = $userinfo->getPassword();
// echo $pass . "<br>";

// $email = $userinfo->getEmail();
// echo $email . "<br>";

// $bbalance = $userinfo->showBankBalance("262164731");
// echo $bbalance . "<br>";

// $cbalance = $userinfo->showCardBalance(4332);
// echo $cbalance . "<br>";

// $data = $userinfo->showHistory();
// foreach($data as $x){
//     echo "<span style=color:red>".$x . "</span><br>";
// }

// $data = $userinfo->showbankAccounts();
// foreach($data as $x){
//     echo "<span style=color:blue>".$x['BankAccountType'] . "</span> , ";
//     echo "<span style=color:blue>".$x['BankAccountNumber'] . "</span> , ";
//     echo "<span style=color:blue>".$x['BankBalance'] . "</span> <br>";
// }

// $data = $userinfo->showPrepaidCards();
// foreach($data as $x){
//     echo "<span style=color:green>".$x['CardType'] . "</span> , ";
//     echo "<span style=color:green>".$x['CardNumber'] . "</span> , ";
//     echo "<span style=color:green>".$x['CardPassword'] . "</span> , ";
//     echo "<span style=color:green>".$x['CVV'] . "</span> , ";
//     echo "<span style=color:green>".$x['CardBalance'] . "</span> <br>";
// }


// echo $userinfo->numberOfUsers();






//TRY DIGITALWALLET CLASS//
//=======================//

// $balance = $wallet->getBalance();
// echo "balance : ".$balance . "<br>";

// $result = $wallet->chargeWalletByCard(30,231);
// if($result) echo "done";
// else echo "error";

// $result = $wallet->chargeWalletByBank(30,"43432521");
// if($result) echo "done";
// else echo "error";





//TRY BANKACCOUNT CLASS//
//=====================//

// $balance = $bankcard->getBalance("432432521");
// echo $balance . "<br>";

// $type = $bankcard->getType("432432521");
// echo $type . "<br>";

// $count = $bankcard->bankNums();
// echo $count . "<br>";




//TRY PREPAIDCARD CLASS//
//=====================//

// echo $card->getType(1111);
// echo $card->cardNums();



//TRY USER CLASS//
//==============//

// if($user->requestForMoney(438,500)){
//     echo "done";
// }
// else{
//     echo "error";
// }

// if($card->cardNums()>1){
//     if($user->deletePrepaidCard(1122)) echo "done";
//     else echo "error";
// }
// else{
//     echo "you cant delete this card";
// }

//$user->feedback("good job");

// $user->addPrepaidCard("paypal","546564","gfd45g54655",1248);

// $user->contactIssue("osamaaaaaaaaaaaaa");

// $user->deletePrepaidCard(4477);

// $user->deleteBankAccount("43344444444");






//TRY ADMIN CLASS//
//===============//

// $admin->ResponseforIssue("help me","help yourself!");



// if($admin->RemoveUser(431)){
//     echo "done";
// }
// else{
//     echo "error";
// }

// $data = $admin->ShowAllUsers();
// foreach($data as $x){
//     echo "<span style=color:green>".$x['IPA'] . "</span> , ";
//     echo "<span style=color:green>".$x['username'] . "</span> , ";
//     echo "<span style=color:green>".$x['email'] . "</span> , ";
//     echo "<span style=color:green>".$x['userpassword'] . "</span> , ";
//     echo "<span style=color:green>".$x['digital_wallet_balance'] . "</span> <br>";
// }


// $data = $admin->ShowAllHistory();
// foreach($data as $x){
//     echo "<span style=color:green>".$x['IPA'] . "</span> , ";
//     echo "<span style=color:green>".$x['Histories'] . "</span> <br>";
// }



?>

<?php
//login.php//
// require_once "../Models/User.php";
// require_once "../Models/UserInformation.php";



// session_start();
// $_SESSION['userpassword'] = "3213311";
// $_SESSION['username'] = "dani";




// $user = new User();
// $userinfo = new UserInformation();
// $_SESSION['userinfo'] = $userinfo;
// $name = $userinfo->getName();
// echo $name . "<br>";



// $query = "UPDATE users SET userpassword = '77777777' WHERE IPA =998";
// $Result = $db->query($query);






// ob_end_flush();
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Four-Digit Input Example</title>
</head>
<body>
    <form action="" method="post">
        <label for="fourDigitInput">Enter 4 digits:</label>
        <input type="text" id="fourDigitInput" name="fourDigitInput" maxlength="4" pattern="\d{4}" title="Please enter exactly 4 digits">
        <input type="submit" value="Submit">
    </form>
</body>
</html> -->

<!-- <form action="" method="post">
<div class="square-container">
  <h1 class="SpeedyPay-Header">SpeedyPay</h1>
  <div class="SpeedyPay-Options">
    <div class="visa">
      <label for="visa"> Visa </label>
      <input type="radio" name="prepaidcard" required>
    </div>
    <div class="Paypal">
      <label for="Paypal"> Paypal </label>
      <input type="radio" name="prepaidcard" required>
    </div>
    <div class="Credit-card">
      <label for="Credit Card"> Credit Card </label>
      <input type="radio" name="prepaidcard" required>
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
  <button type="submit" name="add" class="Add-Button">Add</button>
</div>
</form> -->
