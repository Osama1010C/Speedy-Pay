<?php
require_once 'Database.php';

abstract class Person extends Database{
 
    protected $username;
    protected $age;
    protected $phonenumber;
    protected $password;
    protected $email;    



    // Getter Methods
    public function getUsername() {
        return $this->username;
    }

    public function getAge() {
        return $this->age;
    }

    public function getPhoneNumber() {
        return $this->phonenumber;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }



    //Setter Methods
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phonenumber = $phoneNumber;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    

    

    
}


?>