<?php 
    require_once 'header.php';
    
?>

<style>
  <?php 
    include '../Stylesheets/cff.css';
    include '../stylesheets/login.css';
  ?>
  <?php
    require_once '../Stylesheets/reports_page.css';
  ?>

</style>

<script src="https://kit.fontawesome.com/ba2fdf1c36.js" crossorigin="anonymous"></script>


<?php
   require_once 'nav.php';
   require_once '../Models/DatabaseContext.php';
   require_once '../Models/Account.php';
   require_once './Login/Login.php';
 
   require_once 'footer.php'; 

?>