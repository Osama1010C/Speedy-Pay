<?php

require_once '../Models/Admin.php';
require_once '../Models/Database.php';

$admin = new Admin();
$db = new Database();

$query = "SELECT * FROM userissues WHERE respond IS NULL";
$result = $db->query($query);
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'IPA' => $row["IPA"],
            'issue' => $row["issue"]
        );
    }
}

foreach($data as $x){
    echo $x["IPA"] . " , ";
    echo $x["issue"] . "<br>";
}
$admin->ResponseforIssue("am i ok","me too bro");