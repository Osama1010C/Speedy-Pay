<?php

require_once 'Database.php';

class Admin{

    public function Admin(){

        // $this->username="admin";
        // $this->password="admin";

    }

    // public function Setname($username){
    //     $this->username=$username;
    // }

    // public function Setpassword($password){
    //     $this->password=$password;
    // }

    // public function Getname(){
    //     return $this->username;
    // }

    // public function Getpassword(){
    //     return $this->password;
    // }

    public function ResponseforIssue($issue,$response){
        $db = new Database();
        $query = "UPDATE userissues SET respond = '$response' WHERE issue = '$issue'";
        $Result = $db->query($query);
        if($Result) return true;
        else return false;
    }

    public function RemoveUser($IPA){
        $db = new Database();
        $query = "DELETE FROM users WHERE IPA = $IPA;";
        $Result = $db->query($query);
        if($Result) return true;
        else return false;
    }

    public function ShowAllUsers(){
        $db = new Database();
        $query = "SELECT * FROM users";
        $result1 = $db->query($query);
        $data = array();
        if ($result1->num_rows > 0) {
            
            while($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'IPA' => $row["IPA"],
                    'username' => $row["username"],
                    'email' => $row["email"],
                    'userpassword' => $row["userpassword"],
                    'age' => $row["age"],
                    'phone_number' => $row["phone_number"],
                    'digital_wallet_balance' => $row["digital_wallet_balance"]
                );
            }
            return $data;
        }
    }

    public function ShowAllHistory(){
        $db = new Database();
        $query = "SELECT * FROM userhistory";
        $result1 = $db->query($query);
        $data = array();
        if ($result1->num_rows > 0) {
            
            while($row = $result1->fetch_assoc()) {
                $data[] = array(
                    'IPA' => $row["IPA"],
                    'Histories' => $row["Histories"]
                );
            }
            return $data;
        }
    }

    public function getnumberOfUsers(){
        $db = new Database();
        $query = "SELECT IPA FROM users";
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

    // public function adduserprepaidcard($type,$cardn,$pass,$cvv){
    //     $user = new User();
    //     $user->addPrepaidCard($type,$cardn,$pass,$cvv);
    // }

    // public function adduserbankaccount($type,$bankacc){
    //     $user = new User();
    //     $user->addBankAccount($type,$bankacc);
    // }
}

?>