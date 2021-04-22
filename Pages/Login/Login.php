<?php

if(isset($_POST['login-form__submitbutton'])){

  $username = htmlspecialchars($_POST['login-form__username']);
  $password = htmlspecialchars($_POST['login-form__password']);

  $usernamepattern = "/^[A-Za-z0-9_]{3,16}$/";
  $passwordpattern = "/^[A-Za-z0-9_]{3,16}$/";

  $db = DatabaseContext::dbConnect();

  $AccountDto = new Account();

?>
<script>
 
 window.onload = function () {

  
  var username = document.getElementById("login-form__username");
  var password = document.getElementById("login-form__password");

  var usernamepattern = /^[A-Za-z0-9_]{3,16}$/;
  var passwordpattern = /^[A-Za-z0-9_]{3,16}$/;

  var errorcontainer = document.querySelector(".login-form__errormessages");
  errorcontainer.style.display = "none";

  if(username.value == ""){

    errorcontainer.style.display = "block";
    errorcontainer.innerHTML = "Username cannot be empty";
    return false;

  } else if(password.value == "") {

    errorcontainer.style.display = "block";
    errorcontainer.innerHTML = "Password cannot be empty";
    return false;

  }

  if(!usernamepattern.test(username.value)){

    errorcontainer.style.display = "block";
    errorcontainer.innerHTML = "Username Invalid";
    return false;

  } else if(!passwordpattern.test(password.value)){

    errorcontainer.style.display = "block";
    errorcontainer.innerHTML = "Password Invalid";
    return false;

  }

  
 }

</script>

<?php 

  //Variable to check if credentials are Valid
  $invalidcredentials = 0;

  if($username == "") {

      $invalidcredentials = 1;

  } else if(!preg_match($usernamepattern,$username)){
      
      $invalidcredentials = 1;

  }

  if($password == "") {

      $invalidcredentials = 1;

  } else if(!preg_match($passwordpattern,$password)){

      $invalidcredentials = 1;

  }

  $validlogin = 0;

  if($invalidcredentials == 0) {

    $accounts = $AccountDto->getAccountByUsername($username, $db);

    if($accounts != false){

      if($username == $accounts->username && $password == $accounts->password){

        $validlogin = 1;
        
        if(!isset($_SESSION['username'])) {
          $_SESSION['username'] = $username;
        }
        if(!isset($_SESSION['loggedin'])) {
          $_SESSION['loggedin'] = 1;
        }
        if(!isset($_SESSION['usertype'])) {
          $_SESSION['usertype'] = $accounts->role;
        }
        if(!isset($_SESSION['userid'])) {
          $_SESSION['userid'] = $accounts->user_id;
        }

        header("Location: home.php");
      }

    }
    
  }
  
  if($validlogin == 0 && $invalidcredentials == 0){
?>

    <script>
      window.onload = function () {

       var errorcontainer = document.querySelector(".login-form__errormessages");
       errorcontainer.style.display = "block";
       errorcontainer.innerHTML = "Invalid Credentials";

      }
    </script>  

<?php
  }

}

?>



<div class="main-loginpage">
<form action="" method="POST" name="login-form" class="login-form">
    <h1 class="login-form__mainheading">Login</h1>
    
    <div class="login-form__inputfields">
      <label hidden>Username</label>
      <span><i class="fas fa-user"></i></span>
      <input type="text" placeholder="Username" id="login-form__username" autocomplete="off" name="login-form__username"
        value="<?php echo isset($_POST['login-form__username'])?$_POST['login-form__username']:''; ?>"/>
      <hr/>
    </div>
    <div class="login-form__inputfields">
      <span><i class="fas fa-user"></i></span>
      <label hidden>Password</label>
      <input type="password" placeholder="Password" id="login-form__password" name="login-form__password"
        value="<?php echo isset($_POST['login-form__password'])?$_POST['login-form__password']:''; ?>"/>
      <hr/>
    </div >
    <div class="login-form__errormessages"><?php isset($errormessage)?$errormessage:'Jerrin'; ?></div>
    <input type="submit" value="SIGN IN" class="login-form__submitbutton" name="login-form__submitbutton"/>
    <div class= "login-form__createLink">
      <a href="#" class="login-form__createAccount">Dont have an Account? Join Now</a>
    </div>   
 </form>
 </div>