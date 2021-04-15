<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'header.php'; 
include 'nav.php';

require_once "../Models/NCOER.php";
require_once "../Models/OER.php";
require_once "../Models/DatabaseContext.php";
// Instantiate needed objects
$db = DatabaseContext::dbConnect();
$NcoerObj = new Ncoer();
$OerObj = new Oer();
// Collect data into arrays
$NcoerList = $NcoerObj->getAllNcoers($db);
$OerList = $OerObj->getAllOers($db);
// Declare today's date
$today = time();
//var_dump($today); //Here for debugging purposes
//Initialize list of reports that are overdue
$NcoerOverdueList = array();
$OerOverdueList = array();
//Loop through NCOER array to filter out overdue reports
foreach ($NcoerList as $Ncoer) {
  //Pull out report due date
  $NcoerDue = strtotime($Ncoer->due);
  if ($NcoerDue < $today ) {
    array_push($NcoerOverdueList,$Ncoer);
  }
  //var_dump($NcoerDue);//Here for debugging purposes
}
//Loop through OER array to filter out overdue reports
foreach ($OerList as $Oer) {
  //Pull out report due date
  $OerDue = strtotime($Oer->due);
  if ($OerDue < $today ) {
    array_push($OerOverdueList,$Oer);
  }
  //var_dump($OerDue);//Here for debugging purposes
}
//var_dump($NcoerOverdueList);
//var_dump($OerOverdueList);
?>
<link rel="stylesheet" href="../Stylesheets/reports_page.css">
<!--TODO ADD INFO-->
<div class="m-1">
  <table class="table table-bordered tbl">
    <thead>
      <tr>
        <th scope="col">Alert Priority</th>
        <th scope="col">Alert Description</th>
        <th scope="col">Soldier Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>10</td>
        <td>Birthday</td>
        <td>Tyler, Elliot</td><!-- Eventually will use names pulled from database -->
        <td><a href="#" class="button btn btn-primary">Details</a></td><!-- Takes user to generated page with actions to resolve -->
      </tr>
    </tbody>
  </table>
</div>
<?php include "footer.php"; ?>
