<?php
include 'header.php';
require_once '../Models/UserInformation.php';
$userinfo = new UserInformation();
$data = $userinfo->showHistory();
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
  z-index: 500;
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
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
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
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px; /* Adjust width as needed */
  height: 200px; /* Adjust height as needed */
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
}

</style>
</head>
<body>
<div class="container">
  <h2>History</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"><?php echo $name . "'s "?>History</div>
    </li>
    <?php
    $message = "";
    if($data != null){
        foreach($data as $x){
            echo "<li class=table-row><div class=col col-1 data-label=Job Id>$x</div></li>";
            }
    }
  //   else{
  //     echo "<div class = error>There Is No History Yet</div>";
  // }
        
    ?>
    
  </ul>
  
</div>
<?php
if($data == null){
  echo "<div class = error>There Is No History Yet</div>";
}
?>
</body>
</html>
