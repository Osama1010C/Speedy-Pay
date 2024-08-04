<?php
require_once 'Database.php';
require_once 'User.php';
//DELEGETION pattern 
class UserInformation extends User{


    public function getName() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT username FROM users WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $name = "";
            while($row = $result1->fetch_assoc()) {
                $name =  $row["username"];
            }
            return $name;
        }
    }

    public function getAge() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT age FROM users WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $age = 0;
            while($row = $result1->fetch_assoc()) {
                $age =  $row["age"];
            }
            return $age;
        }
    }

    public function getPhoneNumber() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT phone_number FROM users WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $phone = "";
            while($row = $result1->fetch_assoc()) {
                $phone =  $row["phone_number"];
            }
            return $phone;
        }
    }

    public function getPassword() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT userpassword FROM users WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $pass = "";
            while($row = $result1->fetch_assoc()) {
                $pass =  $row["userpassword"];
            }
            return $pass;
        }
    }

    public function getEmail() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT email FROM users WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $email = "";
            while($row = $result1->fetch_assoc()) {
                $email =  $row["email"];
            }
            return $email;
        }
    }

    public function setPassword($newpass){
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "UPDATE users SET userpassword = '$newpass' WHERE IPA =$IPA";
        $Result = $db1->query($query);
        $_SESSION["userpassword"] = $newpass;
    }

    public function setName($newname){
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "UPDATE users SET username = '$newname' WHERE IPA =$IPA";
        $Result = $db1->query($query);
    }


    public function showCardBalance(int $CVV) {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT CardBalance FROM usercards  WHERE IPA = $IPA AND CVV = $CVV";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $balance = 0;
            while($row = $result1->fetch_assoc()) {
                $balance =  $row["CardBalance"];
            }
            return $balance;
        }
    }

    public function showBankBalance(string $bankAccNum) {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT BankBalance FROM userbankaccounts  WHERE IPA = $IPA AND BankAccountNumber = $bankAccNum";
        $result1 = $db1->query($query);
        if ($result1->num_rows > 0) {
            $balance = 0;
            while($row = $result1->fetch_assoc()) {
                $balance =  $row["BankBalance"];
            }
            return $balance;
        }
    }

    public function showwalletbalance() {
        $IPA = $this->getIPA();
        $wallet = new DigitalWallet(); 
        $balance = $wallet->getBalance();
        return $balance;
    }

    public function showHistory() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT Histories FROM userhistory  WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        $data = array();
        if ($result1->num_rows > 0) {
            
            while($row = $result1->fetch_assoc()) {
                $data[] =  $row["Histories"];
            }
            return $data;
        }
    }

    public function showbankAccounts() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT BankAccountType, BankAccountNumber, BankBalance FROM userbankaccounts  WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        $data = array();
        if ($result1->num_rows > 0) {
            
            while($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'BankAccountType' => $row["BankAccountType"],
                    'BankAccountNumber' => $row["BankAccountNumber"],
                    'BankBalance' => $row["BankBalance"]
                );
            }
            return $data;
        }
    }

    public function showPrepaidCards() {
        $IPA = $this->getIPA();
        $db1 = new Database();
        $query = "SELECT CardType, CardNumber, CardPassword, CVV, CardBalance FROM usercards  WHERE IPA = $IPA";
        $result1 = $db1->query($query);
        $data = array();
        if ($result1->num_rows > 0) {
            
            while($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'CardType' => $row["CardType"],
                    'CardNumber' => $row["CardNumber"],
                    'CardPassword' => $row["CardPassword"],
                    'CVV' => $row["CVV"],
                    'CardBalance' => $row["CardBalance"]
                );
            }
            return $data;
        }
    }

    // public function getnumberOfUsers(){
    //     $db = new Database();
    //     $query = "SELECT IPA FROM users";
    //     $result = $db->query($query);
    //     if ($result->num_rows > 0) {
    //         $count = 0;
    //         while($row = $result->fetch_assoc()) {
    //             $count++;
    //         }
    //         return $count;
    //     } else {
    //         return false;
    //     }
    // }
    
}

?>