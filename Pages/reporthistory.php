<?php
require_once '../Models/User.php';
session_start();
if(isset($_POST["download"])){
    include 'adminreport.php';
  }
?>