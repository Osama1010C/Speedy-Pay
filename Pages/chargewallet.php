<?php
include 'header.php';
 require_once '../Models/UserInformation.php';
 require_once '../Models/DigitalWallet.php';
 $wallet = new DigitalWallet();
 $userinfo = new UserInformation();
 $datacards = $userinfo->showPrepaidCards();
 $databanks = $userinfo->showbankAccounts();

 $wbalance = $wallet->getBalance();

$message = "";
$done = "";
$option=null;
 if (isset($_POST["charge"])) {
    $money = $_POST['money'];
    if(isset($_POST['options'])){
        $option = $_POST['options'];
        $stringoption = $option . '';
        $count = strlen($stringoption);
        if($count == 4){
            $cbalance = $userinfo->showCardBalance($option);
            if($money > $cbalance){
                $message = "NO Enough money in your Prepaid Card";
            }
            else{
                $wallet->chargeWalletByCard($money,$option);
                $done = "You have charged your digital wallet";
                
            }
        }
        else{
            $bbalance = $userinfo->showBankBalance($option);
            if($money > $bbalance){
                $message = "NO Enough money in your Bank Account";
            }
            else{
                $wallet->chargeWalletByBank($money,$option);
                $done = "You have charged your digital wallet";
                
            }
        }
        
        
    }
    else {
        $message ="Please select an option";
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Charge Wallet</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="num"],
    input[type="radio"] {
        margin-right: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: calc(100% - 22px);
        box-sizing: border-box;
    }
    

    input[type="num"]:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
    }

    .radio-groups {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .radio-group label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="radio"] + label {
        display: inline-block;
        cursor: pointer;
        padding: 10px 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    input[type="radio"]:checked + label {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        position: relative;
        top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

</style>
</head>
<body>

<form action="" method="post">
    <h2>Charge Wallet</h2>
    <label for="money">Enter The Money</label>
    <input type="num" id="money" name="money" required><br><br>

    <div class="radio-groups">
        <?php
            if($databanks == null && $datacards == null){
                echo "<div class = error>there is no cards you can't charge your wallet</div>";
            }
        ?>
        <div class="radio-group">
        <div>Prepaid Cards</div><br><br>
        <?php
            if($datacards != null){
                foreach($datacards as $x){
                   echo "<label for=option1><input type=radio id=option1 name=options value=$x[CVV]>".$x["CardType"]." : $".$x["CardBalance"]."</label>";
                }
            }
            
        ?>
            
        </div>
        
        <div class="radio-group">
        <div>Bank Accounts</div><br><br>
        <?php
            if($databanks != null){
                foreach($databanks as $x){
                    echo "<label for=option2><input type=radio id=option2 name=options value=$x[BankAccountNumber]>".$x["BankAccountType"]." : $".$x["BankBalance"]."</label>";
                }
            }
            
        ?>
        </div>
    </div>
    <div style="color: red;"><?=$message?></div>
    <div style="color: green;"><?=$done?></div>
    <div>Wallet Balance : $<?=$wbalance?></div>
    <input type="submit" value="Charge" name="charge">
</form>

</body>
</html>
