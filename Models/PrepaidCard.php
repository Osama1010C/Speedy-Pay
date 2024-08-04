<?php
require_once 'Database.php'; 
require_once 'User.php';
//Degletion pattern
class PrepaidCard { 
  

    public function getType(int $CVV){
        
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "SELECT CardType FROM usercards  WHERE IPA = $IPA AND CVV = $CVV";
        $result1 = $db2->query($query);
        if ($result1->num_rows > 0) {
            $type = "";
            while($row = $result1->fetch_assoc()) {
                $type =  $row["CardType"];
            }
            return $type;
        }
    }

    public function getCardNum(int $CVV){
       
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "SELECT CardNumber FROM usercards  WHERE IPA = $IPA AND CVV = $CVV";
        $result1 = $db2->query($query);
        if ($result1->num_rows > 0) {
            $num = "";
            while($row = $result1->fetch_assoc()) {
                $num =  $row["CardNumber"];
            }
            return $num;
        }
    }

    public function getPassword(int $CVV){
        
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "SELECT CardPassword FROM usercards  WHERE IPA = $IPA AND CVV = $CVV";
        $result1 = $db2->query($query);
        if ($result1->num_rows > 0) {
            $pass = "";
            while($row = $result1->fetch_assoc()) {
                $pass =  $row["CardPassword"];
            }
            return $pass;
        }
    }

    public function getBalance(int $CVV){
        
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "SELECT CardBalance FROM usercards  WHERE IPA = $IPA AND CVV = $CVV";
        $result1 = $db2->query($query);
        if ($result1->num_rows > 0) {
            $balance = 0;
            while($row = $result1->fetch_assoc()) {
                $balance =  $row["CardBalance"];
            }
            return $balance;
        }
    }

    public function setPassword(int $CVV, string $password){
        
        $user = new User();
        $IPA = $user->getIPA();
        $db2 = new Database();
        $query = "UPDATE usercards SET CardPassword = '$password' WHERE IPA =$IPA AND CVV = $CVV";
        $Result = $db2->query($query);
    }

    public function cardNums(){
        $db = new Database();
       
        $user = new User();
        $IPA = $user->getIPA();
        $query = "SELECT CVV FROM usercards WHERE IPA = $IPA";
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