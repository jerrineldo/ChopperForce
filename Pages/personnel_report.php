<?php 
  include "header.php"; 
  include "nav.php"; 
?>
<link rel="stylesheet" href="../Stylesheets/reports_page.css">

<?php
  require_once '../Models/DatabaseContext.php';
  require_once '../Models/User.php';
  include './personal_report/list.php';
  include "footer.php"; 
?>
