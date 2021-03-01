<?php include "header.php" ?>
<div class="loginBox">
  <form action="" method="post" name="userRegistration" id="userRegistration">
    <h1>Register a new account</h1>
    <label for="username">Username: </label>
    <span class="userRegistration__errorMessage_hidden" id="usernameError"></span>
    <input type="text" name="username"/>
    <label for="password">Password:</label>
    <span class="userRegistration__errorMessage_hidden" id="passwordError"></span>
    <input type="password" name="password">
    <label for="passwordConfirm">Confirm password: </label>
    <input type="password" name="passwordConfirm">
    <input type="submit" name="registrationBtn" value="Register">
  </form>
</div>

<?php include "footer.php"; ?>
