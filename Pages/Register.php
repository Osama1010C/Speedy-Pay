<?php
require_once "../Models/Database.php";
session_start();
$db = new Database();
$messageIPA = "";
$messageinfo = "";
$username = "" ; 
$email = null;
$password = null;
$IPA = null;
$age = null;
$phonenumber = null; 

if (isset($_POST["IPA"]) && isset($_POST["username"]) && isset($_POST["email"]) && $_POST["password"] && isset($_POST["age"]) && isset($_POST["phonenumber"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $IPA = $_POST["IPA"];
    $age = $_POST["age"];
    $phonenumber = $_POST["phonenumber"]; 
}

if(isset($_POST["terms"])){
  $db = new Database();
  $query = "SELECT IPA,email,userpassword FROM users";
  $result = $db->query($query);
  if ($result->num_rows > 0) {
      $repeat = false;
      while($row = $result->fetch_assoc()) {
          if(($row["IPA"] == $IPA)){
            $repeat = true;
            $messageIPA = "This IPA is alreay used";
            break;
          }
          if(($row["email"] == $email && $row["userpassword"] == $password)){
            $repeat = true;
            $messageinfo = "This Information is alreay used";
            break;
          }
      }
  }
  if(!$repeat){
    $db->query("INSERT INTO `users`(`IPA`, `username`, `email`, `userpassword`, `age`, `phone_number`, `digital_wallet_balance`) VALUES ('$IPA','$username','$email','$password','$age','$phonenumber',0)");
    $_SESSION["email"] = $email;
    $_SESSION["userpassword"] = $password;
    header("Location: index.php");
  }
  
}
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <h4 class="mb-2"> Welcome To SpeedyPay </h4>
              <p class="mb-4">Transfer Money To Anyone AnyWhere!</p>

              <form id="formAuthentication" class="mb-3" action="Register.php" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label" >Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                    required
                    value= "<?= $username?>" 
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value= "<?= $email?>"  required />
                </div>
                <div style="color: red;"><?= $messageinfo?></div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                      value= "<?= $password?>" 
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  <div style="color: red;"><?= $messageinfo?></div>
                </div>

                <div class="IPA">
                  <label class="form-label" for="IPA">IPA</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="IPA"
                      class="form-control"
                      name="IPA"
                      maxlength="3"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                      value= "<?= $IPA?>" 
                    />
                    
                  </div>
                  <div style="color:red;"><?= $messageIPA?></div>
                </div>

                <div class="Phonenumber">
                  <label class="form-label" for="Phonenumber">Phonenumber</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="text"
                      id="phonenumber"
                      class="form-control"
                      name="phonenumber"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                      value= "<?= $phonenumber?>" 
                    />
                  </div>
                </div>

                <div class="age">
                  <label class="form-label" for="age">Age</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="age"
                      class="form-control"
                      name="age"
                      maxlength="3"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                      value= "<?= $age?>" 
                    />
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="Login.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
 
  </body>
</html>


<?php



?>
