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
    
    include './physicalfitness_report/update.php';
    include 'footer.php'; 
?>