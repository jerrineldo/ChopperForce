<?php 
    include 'header.php';
    include 'nav.php';
?>
<style>
<?php
    require_once '../Stylesheets/reports_page.css';
?>
</style>
<?php 
    require_once '../Models/DatabaseContext.php';
    require_once '../Models/PhysicalFitness.php';
    require_once '../Models/User.php';
    require_once '../Models/FitnessCategory.php';
    require_once '../Library/form-functions.php';
    include './physicalfitness_report/add.php';
    include 'footer.php'; 
?>