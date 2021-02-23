<?php include "header.php"; ?>

<div class="loginBox">
  <form action="" method="post" name="userLogin" id="userLogin">
    <h1>Login</h1>
    <label for="username">Username: </label>
    <span class="userLogin__errorMessage_hidden" id="usernameError"></span>
    <input type="text" name="username"/>
    <label for="password">Password:</label>
    <span class="userLogin__errorMessage_hidden" id="passwordError"></span>
    <input type="password" name="password">
    <input type="submit" name="loginBtn" value="Login">
  </form>

  <p><a href="registration.php">Register new account</a></p>
  <p><a href="">Forgot password?</a></p>
</div>

<?php include "footer.php"; ?>
