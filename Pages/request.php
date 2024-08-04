<?php
require_once '../Models/UserInformation.php';
require_once '../Models/User.php';
require_once '../Models/Database.php';

include 'header.php';
$user = new User();
$IPA = $user->getIPA();
$db = new Database();
$query = "SELECT * FROM usersrequest WHERE IPAreceiver = $IPA";
$result = $db->query($query);
$data = array();
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'IPAsender' => $row["IPAsender"],
            'IPAreceiver' => $row["IPAreceiver"],
            'money' => $row["money"]
        );
    }
}



if(isset($_POST["yes"])){
  $value = $_POST["yes"];
  $money = $_POST["money"];
  $user->transferToUserByWallet($value,$money);
  $query = "DELETE FROM usersrequest WHERE IPAsender = $value AND IPAreceiver = $IPA";
  $Result = $db->query($query);
  
}
elseif(isset($_POST["no"])){
  $value = $_POST["no"];
  $query = "DELETE FROM usersrequest WHERE IPAsender = $value AND IPAreceiver = $IPA";
  $Result = $db->query($query);
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Boxes</title>
    <style>
      body{
        background-image: url("../imgs/bitcoin-banknotes-frame.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
}

.container {
  display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    
}

.box {
    width: 200px;
    height: 200px;
    /* background-color: #f0f0f0; */
    background-color: #222a2d;
    /* border: 1px solid #ccc; */
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    margin: 15px;
    transition-duration: .4s;
    box-shadow: 1 1 1 1 black;
    
}
.box:hover{
  background-color: #1d2427;
}

.buttons {
    margin-top: 7px;
    
}

.buttons button {
    padding: 8px 16px;
    margin: 0 5px;
    font-size: 14px;
    cursor: pointer;
    margin: 10px;
    color:white;
    border: none;
    border-radius: 10px;
}
.buttons .b1 {
    background-color: green;
    transition-duration: .3s;
}
.buttons .b1:hover {
    background-color: #4caf50;
}
.buttons .b2 {
    background-color: red;
    transition-duration: .3s;
}
.buttons .b2:hover {
    background-color: #ee2b1d;
}
h2,h3{
  color: white;
}
.error{
    display: flex;
    color: white;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px; /* Adjust width as needed */
  height: 200px; /* Adjust height as needed */
  background-color: #222a2d;
  padding: 20px;
  border-radius: 5px;
}
    </style>
</head>
<body>
    <div class="container">
      <form action="" method="post">
      
        <?php
        foreach($data as $x){
          echo "<div class=box>";
          echo "<h2>From IPA ".$x["IPAsender"]."</h2>";
          echo "<h3>can you give me ".$x["money"]."$<h3>";
          echo "<input style=display:none; type=number name=money value=$x[money]>";
          echo "<div class=buttons>";
          echo"<button class=b1 name = yes value = $x[IPAsender]>Accept</button>";
          echo"<button class =b2 name = no value = $x[IPAsender]>Refuse</button>";
          echo"</div>";
          echo"</div>";
        }
        
        ?>
      </form>
        
    </div>
    <?php
    if($data == null){
    echo "<div class = error>There Is No Cards</div>";
}
?>
</body>
</html>
