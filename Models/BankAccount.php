<?php
require_once 'Database.php';
require_once 'User.php';

// Degletion pattern
class BankAccount{

    private $bankAccNum;
    private $balance;
    private $type;

    public function getBalance(string $bankAccNum) {
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "SELECT BankBalance FROM userbankaccounts  WHERE IPA = $IPA AND BankAccountNumber = $bankAccNum";
        $result1 = $db2->query($query);
        if ($result1->num_rows > 0) {
            $balance = 0;
            while($row = $result1->fetch_assoc()) {
                $balance =  $row["BankBalance"];
            }
            return $balance;
        }
    }

    public function getType(string $bankAccNum) {
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "SELECT BankAccountType FROM userbankaccounts  WHERE IPA = $IPA AND BankAccountNumber = $bankAccNum";
        $result1 = $db2->query($query);
        if ($result1->num_rows > 0) {
            $type = "";
            while($row = $result1->fetch_assoc()) {
                $type =  $row["BankAccountType"];
            }
            return $type;
        }
    }

    public function setBankAccNum(string $newbankAccNum,string $oldbankAccNum) {
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "UPDATE userbankaccounts SET BankAccountNumber = '$newbankAccNum' WHERE IPA =$IPA AND BankAccountNumber = $oldbankAccNum";
        $Result = $db2->query($query);
    }

    public function bankNums(){
        $db = new Database();
        $user = new User();
        $IPA = $user->getIPA();
        $query = "SELECT BankAccountNumber FROM userbankaccounts WHERE IPA = $IPA";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()) {
                $count++;
            }
            return $count;
        } else {
            return false;
        }
    }

    
}

?>