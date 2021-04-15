<!--Use DB Data to generate quantities of people-->
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "../Models/OER.php";
require_once "../Models/NCOER.php";
require_once "../Models/DatabaseContext.php";
// Code to extract reports coming due soon written by Journey, overdue reports written by Luis
$dbcon = DatabaseContext::dbConnect();//DatabaseContext
$s = new Oer();
$oers = $s->getAllUpcommingOers($dbcon);
$OerList = $s->getAllOers($dbcon);
$s = new Ncoer();
$NcoerList = $s->getAllNcoers($dbcon);
$ncoers = $s->getUpcommingNcoers($dbcon);
$today = time();
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
}
//Loop through OER array to filter out overdue reports
foreach ($OerList as $Oer) {
  //Pull out report due date
  $OerDue = strtotime($Oer->due);
  if ($OerDue < $today ) {
    array_push($OerOverdueList,$Oer);
  }
}
?>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" id="rosterTitle" style="color:#9d9d9d; padding-left: 5px;">Roster:</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Officers
                        <span class="badge badge-primary badge-pill">6</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">NCOs
                        <span class="badge badge-primary badge-pill">22</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">Warrent Officers
                        <span class="badge badge-primary badge-pill">12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">Enlisted
                        <span class="badge badge-primary badge-pill">102</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" id="rosterTitle" style="color:#9d9d9d; padding-left: 5px;">Pie Chart:</h4>
            </div>
        </div>
    </div>
</div>
<h2 style="color:#9d9d9d; " class="report-title">Upcoming OER</h2>

    
<table class="table" style="color:#9d9d9d;">        
    <thead>
        <tr class="table-danger">
            <th scope="col">OER_ID</th>
            <th scope="col">Rank </th>
            <th scope="col">Name</th>
            <!-- <th scope="col">Last Name</th> -->
            <th scope="col">Rater</th>
            <th scope="col">Due</th>
            <th scope="col">Days Left</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($oers as $oer) { ?>
        <tr>
            
            <th><?= $oer->id; ?></th>
            <th><?= $oer->rank; ?></th>
            <th><?= $oer->name; ?></th>
            <th><?= $oer->rater; ?></th>
            <th><?= $oer->due; ?></th>
            <th><?= $oer->Countdown; ?></th>
            
        <?php } ?>
    </tbody>
</table>
   
<h2 style="color:#9d9d9d;"> Upcoming NCOER</h2>

<table class="table" style="color:#9d9d9d; ">        
    <thead>
        <tr>
            <th scope="col">NCOER_ID</th>
            <th scope="col">Rank </th>
            <th scope="col">Name</th>
            <th scope="col">Rater</th>
            <th scope="col">Due</th>
            <th scope="col">Days Left</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ncoers as $ncoer) { ?>
        <tr>
            <th><?= $ncoer->id; ?></th>
            <th><?= $ncoer->rank; ?></th>
            <th><?= $ncoer->name; ?></th>
            <th><?= $ncoer->rater; ?></th>
            <th><?= $ncoer->due; ?></th>
            <th><?= $ncoer->Countdown; ?></th>
              
        </tr>
    <?php } ?>
    </tbody>
</table>
<br>
<br>
<br>
</div>
