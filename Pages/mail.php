<?php
require_once '../Models/UserInformation.php';
require_once '../Models/User.php';
require_once '../Models/Database.php';
include 'header.php';
$user = new User();
$IPA = $user->getIPA();
$db = new Database();
$query = "SELECT * FROM userissues WHERE IPA = $IPA";
$result = $db->query($query);
$data = array();
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'issue' => $row["issue"],
            'respond' => $row["respond"]
        );
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chat Interface</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 1000px; /*100vh*/
        background-image: url("../imgs/paper_airplane_send_with_dotted_lines_flat_style.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        margin-top: 20px;
    }

    .chat-container {
        max-width: 600px;
        width: 100%;
    }

    .chat-box {
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
        clear: both;
    }

    .message.right {
        float: right;
        background-color: #DCF8C6;
    }

    .message.left {
        float: left;
        background-color: #EAEAEA;
    }

    .message p {
        margin: 0;
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
    <div class="chat-container">
        
    <div class="chat-box">
            <?php
            foreach($data as $x){
                
                echo"<div class='message left'><p>".$x["issue"]."</p></div>";
                echo"<div class='message right'><p>".$x["respond"]."</p></div>";   
                
            }
            ?>
    </div>

    </div>
    <?php
    if($data == null){
    echo "<div class = error>There Is No <span style= color:#03a9f4;>&nbsp;Messages<span></div>";
}
?>

</body>
</html>