<?php
require_once 'Database.php';
require_once 'User.php';


class DigitalWallet {

    private $balance; 

    

    public function getBalance() {
        $user = new User();
        $IPA = $user->getIPA();
        $db1 = new Database();
        $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $balance = 0;
            while($row = $result1->fetch_assoc()) {
                $balance =  $row["digital_wallet_balance"];
            }
            return $balance;
        }
    }

    public function chargeWalletByCard(float $money, int $CVV) {
        $db = new Database();
        $user = new User();
        $IPA = $user->getIPA();
        
        $query = "SELECT CardBalance FROM usercards WHERE IPA = $IPA AND CVV = $CVV";
        $result = $db->query($query);
        $balance=0;
        if ($result->num_rows > 0) {
          
            while($row = $result->fetch_assoc()) {
                $balance += $row["CardBalance"];
            }
            if($money > $balance) return false;
            else{
                $balance-=$money;
                $query = "UPDATE usercards SET CardBalance = $balance WHERE IPA = $IPA AND CVV = $CVV";
                $Result = $db->query($query);

                $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPA";
                $result = $db->query($query);
                $newbalance=$money;
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        $newbalance += $row["digital_wallet_balance"];
                    }
                    $query = "UPDATE users SET digital_wallet_balance = $newbalance WHERE IPA = $IPA";
                    $Result = $db->query($query);
                    if($Result){
                        $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have charged your digital wallet with $money$ using your prepaid card');";
                        $output = $db->query($query);
                        if($output)
                            return true;
                        else
                            return false;
                    }
                    else return false;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function chargeWalletByBank(float $money, string $bankAccNum) {
        $db = new Database();
        $user = new User();
        $IPA = $user->getIPA();
        
        $query = "SELECT BankBalance FROM userbankaccounts WHERE IPA = $IPA AND BankAccountNumber = '$bankAccNum'";
        $result = $db->query($query);
        $balance=0;
        if ($result->num_rows > 0) {
          
            while($row = $result->fetch_assoc()) {
                $balance += $row["BankBalance"];
            }
            if($money > $balance) return false;
            else{
                $balance-=$money;
                $query = "UPDATE userbankaccounts SET BankBalance = $balance WHERE IPA = $IPA AND BankAccountNumber = '$bankAccNum'";
                $Result = $db->query($query);

                $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPA";
                $result = $db->query($query);
                $newbalance=$money;
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        $newbalance += $row["digital_wallet_balance"];
                    }
                    $query = "UPDATE users SET digital_wallet_balance = $newbalance WHERE IPA = $IPA";
                    $Result = $db->query($query);
                    if($Result){
                        $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have charged your digital wallet with $money$ using your bank account');";
                        $output = $db->query($query);
                        if($output)
                            return true;
                        else
                            return false;
                    }
                    else return false;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    
}

?>