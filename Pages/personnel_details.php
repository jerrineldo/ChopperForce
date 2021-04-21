<?php 
  include "header.php"; 
  include "nav.php"; 
?>
<link rel="stylesheet" href="../Stylesheets/reports_page.css">

<?php 
  require_once '../Models/DatabaseContext.php';
  require_once '../Models/User.php';
  require_once '../Models/Award.php';
  require_once '../Models/Dutie.php';
  require_once '../Models/EmergencyContact.php';
  require_once '../Models/FamilyContact.php';
  require_once '../Models/PhysicalFitness.php';
  require_once './personal_report/details.php';
  include "footer.php"; 
?>
