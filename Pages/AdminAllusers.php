<?php
include 'AdminHeader.php';
require_once '../Models/Admin.php';
require_once '../Models/Person.php';

$admin = new Admin();

$data = $admin->ShowAllUsers();
$message = "";
 if(isset($_POST["delete"])){
    $value = $_POST["delete"];
    $admin->RemoveUser($value);
    $message = "User Is Deleted";  
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search History</title>
<style>
body {
  font-family: 'lato', sans-serif;
}
.container {
    position: relative;
    top: 80px;
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
    position: relative;
    left: 180px;
  }
  .col-3 {
    flex-basis: 25%;
    position: relative;
    left: 80px;
  }
  .col-4 {
    flex-basis: 25%;
    position: relative;
    left: 135px;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    /* .table-row{
      
    } */
    li {
      display: block;
      
    }
    .col {
      
      flex-basis: 100%;
      
      
    }
    .col {
      display: flex;
      padding: 10px 0;
     
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
        
      }
    }
  }
}
.error{
    display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px; /* Adjust width as needed */
  height: 200px; /* Adjust height as needed */
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
}
.custom-button {
    background-color: red; /* Background color */
    color: white; /* Text color */
    padding: 10px 20px; /* Padding */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Cursor on hover */
    font-size: 16px; /* Font size */
}

/* Hover effect */
.custom-button:hover {
    background-color: darkred; /* Darker background color on hover */
}

</style>
</head>
<body>
<div class="container">
  <h2>Users</h2>
  <form action="" method="post">
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">IPA</div>
      <div class="col col-2">UserName</div>
      <div class="col col-3">Email</div>
      <div class="col col-4">Operation</div>
    </li>
    <div style="color: green;"><?=$message?></div>
    <?php
        
        if($data != null){
            foreach($data as $x){
                echo "<li class=table-row>";
                echo "<div class=col col-1 data-label=Job Id>".$x["IPA"]."</div>";
                echo "<div class=col col-2 data-label=Customer Name>".$x["username"]."</div>";
                echo "<div class=col col-3 data-label=Amount>".$x["email"]."</div>";
                echo "<div class=col col-4 data-label=Payment Status><button class=custom-button style=background-color: red; color:#ffffff; type=submit value=$x[IPA] name=delete>Delete</div>";
                echo "</li>";
                
            }
        }
        
    ?>
    
  </ul>
  </form>

</div>
<?php
  if($data == null){
    echo "<div class = error>There Is No Users</div>";
}
  ?>
</body>
</html>