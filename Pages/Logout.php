<?php 
    require_once 'header.php';
?>

<style>
  <?php 
    include '../stylesheets/cff.css' 
  ?>
  <?php 
    include '../stylesheets/login.css';
    require_once '../Stylesheets/reports_page.css';
  ?>

</style>



<?php

   require_once 'nav.php';
?>
<div class="logout-content">

<h2>You have been Logged out</h2>
<a class="btn btn-primary align-right" name="login" href="Login.php" role="button">Click here to Login</a>

</div>

<?php
   require_once 'footer.php'; 

?>