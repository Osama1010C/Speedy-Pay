<?php
require_once 'Database.php';
require_once 'Person.php';


class User  {
    
    protected $IPA;

    public function getIPA() {
        $db1 = new Database();
        $query = "SELECT IPA FROM users WHERE userpassword = '$_SESSION[userpassword]' AND email = '$_SESSION[email]'";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $IPAuser = "";
            while($row = $result1->fetch_assoc()) {
                $IPAuser =  $row["IPA"];
            }
        }
        $this->IPA = $IPAuser;
        return $this->IPA;
    }

    // public function contactIssue(string $issue) {
    //     $db = new Database();
    //     $IPA = $this->getIPA();
    //     $query = "INSERT INTO userissues (IPA, issue) VALUES ($IPA,'$issue');";
    //     $Result = $db->query($query);
    //     if($Result){
    //         $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have sent an issue');";
    //         $output = $db->query($query);
    //         if($output)
    //             return true;
    //         else
    //             return false;
    //     }
    //     else return false;
    // }


    public function contactIssue(string $issue) {
        $db = new Database();
        $IPA = $this->getIPA();
        $query = "INSERT INTO userissues (IPA, issue) VALUES ($IPA,'$issue');";
        $Result = $db->query($query);
        if($Result){
            $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have sent an issue');";
            $output = $db->query($query);     
        }
        
    }

    public function addPrepaidCard(string $type, string $cardNumber, string $password, int $CVV) {
        $db = new Database();
        $IPA = $this->getIPA();
        $query = "INSERT INTO usercards (IPA, CardType, CardNumber, CardPassword, CVV, CardBalance) VALUES ($IPA,'$type','$cardNumber','$password',$CVV,1000);";
        $Result = $db->query($query);
        if($Result){
            $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have added a new Prepaid Card');";
            $output = $db->query($query);
            if($output)
                return true;
            else
                return false;
        } 
        else return false;
    }

    public function addBankAccount(string $type, string $bankAccNum) {
        $db = new Database();
        $IPA = $this->getIPA();
        $query = "INSERT INTO userbankaccounts (IPA, BankAccountType, BankAccountNumber, BankBalance) VALUES ($IPA,'$type','$bankAccNum',1000);";
        $Result = $db->query($query);
        if($Result){
            $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have added a new Bank Account');";
            $output = $db->query($query);
            if($output)
                return true;
            else
                return false;
        }
        else return false;
    }

    public function transferToUserByCard(int $IPArcvr, float $money, int $CVV) {
        $db = new Database();
        $IPA = $this->getIPA();
        
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

                $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPArcvr";
                $result = $db->query($query);
                $newbalance=$money;
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        $newbalance += $row["digital_wallet_balance"];
                    }
                    $query = "UPDATE users SET digital_wallet_balance = $newbalance WHERE IPA = $IPArcvr";
                    $Result = $db->query($query);
                    if($Result){
                        $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have sent $money$ to user with IPA $IPArcvr from your card');";
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


    public function transferToUserByBank(int $IPArcvr, float $money, string $bankAccNum) {
        $db = new Database();
        $IPA = $this->getIPA();
        
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

                $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPArcvr";
                $result = $db->query($query);
                $newbalance=$money;
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        $newbalance += $row["digital_wallet_balance"];
                    }
                    $query = "UPDATE users SET digital_wallet_balance = $newbalance WHERE IPA = $IPArcvr";
                    $Result = $db->query($query);
                    if($Result){
                        $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have sent $money$ to user with IPA $IPArcvr from your bank account');";
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


    public function transferToUserByWallet(int $IPArcvr, float $money) {
        $db = new Database();
        $IPA = $this->getIPA();
        
        $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPA";
        $result = $db->query($query);
        $balance=0;
        if ($result->num_rows > 0) {
          
            while($row = $result->fetch_assoc()) {
                $balance += $row["digital_wallet_balance"];
            }
            if($money > $balance) return false;
            else{
                $balance-=$money;
                $query = "UPDATE users SET digital_wallet_balance = $balance WHERE IPA = $IPA";
                $Result = $db->query($query);

                $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPArcvr";
                $result = $db->query($query);
                $newbalance=$money;
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        $newbalance += $row["digital_wallet_balance"];
                    }
                    $query = "UPDATE users SET digital_wallet_balance = $newbalance WHERE IPA = $IPArcvr";
                    $Result = $db->query($query);
                    if($Result){
                        $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have sent $money$ to user with IPA $IPArcvr from your wallet');";
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

    public function requestForMoney(int $IPAuser, float $money) {
        $db = new Database();
        $IPA = $this->getIPA();
        $query = "INSERT INTO usersrequest (IPAsender, IPAreceiver, money) VALUES ($IPA, $IPAuser, $money);";
        $Result = $db->query($query);
        if($Result){
            $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have sent request to user with IPA $IPAuser to give you $money$');";
            $output = $db->query($query);
            if($output)
                return true;
            else
                return false;
        }
    }

    public function feedback(string $message) {
        $db = new Database();
        $IPA = $this->getIPA();
        $query = "INSERT INTO userfeedback (IPA, feedbacks) VALUES ($IPA, '$message');";
        $Result = $db->query($query);
    }

    public function deletePrepaidCard(int $CVV){
        $db = new Database();
        $IPA = $this->getIPA();
        $query = "SELECT CardBalance FROM usercards WHERE CVV = $CVV";
        $Result = $db->query($query);
        $count = 0;
        // if ($result->num_rows > 0) {
        //     // Output data of each row
            
        //     while($row = $result->fetch_assoc()) {
        //         $count+=$row["CardBalance"];
        //     }
        // }
        // $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPA";
        // $result = $db->query($query);
        
        // if ($result->num_rows > 0) {
        //     // Output data of each row
            
        //     while($row = $result->fetch_assoc()) {
        //         $count+=$row["digital_wallet_balance"];
        //     }
        // }
        // $query = "UPDATE users SET digital_wallet_balance = $count WHERE IPA =$IPA";
        // $Result = $db->query($query);
        $query = "DELETE FROM usercards WHERE CVV = $CVV;";
        $Result = $db->query($query);
        if($Result){
            $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have Deleted a Prepaid Card');";
            $output = $db->query($query);
            if($output)
                return true;
            else
                return false;
        }
        
    }

    public function deleteBankAccount(string $bankAccNum){
        $db = new Database();
        $IPA = $this->getIPA();
        $query = "SELECT BankBalance FROM userbankaccounts WHERE BankAccountNumber = $bankAccNum";
        $Result = $db->query($query);
        // $count = 0;
        // if ($result->num_rows > 0) {
        //     // Output data of each row
            
        //     while($row = $result->fetch_assoc()) {
        //         $count+=$row["BankBalance"];
        //     }
        // }
        // $query = "SELECT digital_wallet_balance FROM users WHERE IPA = $IPA";
        // $result = $db->query($query);
        
        // if ($result->num_rows > 0) {
        //     // Output data of each row
            
        //     while($row = $result->fetch_assoc()) {
        //         $count+=$row["digital_wallet_balance"];
        //     }
        // }
        // $query = "UPDATE users SET digital_wallet_balance = $count WHERE IPA =$IPA";
        // $Result = $db->query($query);
        $query = "DELETE FROM userbankaccounts WHERE BankAccountNumber = $bankAccNum;";
        $Result = $db->query($query);
        if($Result){
            $query = "INSERT INTO userhistory (IPA, Histories) VALUES ($IPA,'you have Deleted a Bank Account');";
            $output = $db->query($query);
            if($output)
                return true;
            else
                return false;
        }
    }

    
}

?>