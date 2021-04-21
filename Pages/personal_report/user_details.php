<?php
// Developed by Luis
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'header.php';
require 'nav.php';

$db = DatabaseContext::dbConnect();

$user_id = $_GET['id'];
$fitnessReport = new fitnessReport();
$emergencyContacts = new EmergencyContact();
$familyContacts = new familyContact();
$awards = new Award();
$duty = new Dutie();

$fitnessReport = $fitnessReport->getFitnessReportById($user_id,$db);
$emergencyContacts = $emergencyContacts->getEmergencyContactByID($db,$user_id);
$familyContacts = $familyContacts->getFamilyContactByID($db,$user_id);
$awards = $awards->getAwardsById($user_id,$db);
$duty = $duty->getDutieById($user_id,$db);
?>

<?php require 'footer.php'; ?>