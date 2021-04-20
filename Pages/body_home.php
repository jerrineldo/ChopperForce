
<!--Use DB Data to generate quantities of people-->
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once "../Models/OER.php";
require_once "../Models/NCOER.php";
require_once "../Models/User.php";
require_once "../Models/DatabaseContext.php";
require_once "../Models/User.php";
// Code to extract reports coming due soon written by Journey, overdue reports written by Luis
$dbcon = DatabaseContext::dbConnect();//DatabaseContext
$s = new Oer();
$oers = $s->getAllUpcommingOers($dbcon);
$OerList = $s->getAllOers($dbcon);
$s = new Ncoer();
$ncoers = $s->getUpcommingNcoers(DatabaseContext::dbConnect());

$NcoerList = $s->getAllNcoers($dbcon);
$ncoers = $s->getUpcommingNcoers($dbcon);

$today = time();
$s = new User();
$Users = $s->getAllUsesByRank(DatabaseContext::dbConnect());
$UserList = $s->getAllUsers($dbcon);
//Initialize list of reports that are overdue
$NcoerOverdueList = array();
$OerOverdueList = array();
//Loop through NCOER array to filter out overdue reports
foreach ($NcoerList as $Ncoer) {
  //Pull out report due date
  $NcoerDue = strtotime($Ncoer->due);
  if ($NcoerDue < $today ) {
    $id = $Ncoer->user_id;
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Rank', 'Count'],
            <?php foreach ($Users as $user) {
                ?>
               ['<?php echo $user->rank ?>',<?php echo (int)$user->NumberofSoldiersByRank ?>],
            <?php } ?>
        ]);
        var options = {
            title: 'Rank Unit Breakdown'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" id="rosterTitle" style="color:#9d9d9d; padding-left: 5px;">Roster:</h4>
                <ul class="list-group">
                    <?php foreach ($Users as $user) { ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center"><?= $user->rank; ?>
                        <span class="badge badge-primary badge-pill"><?= $user->NumberofSoldiersByRank?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" id="rosterTitle" style="color:#9d9d9d; padding-left: 5px;">Pie Chart:</h4>
                <div id="piechart" style="width: 500px; height: 500px;"></div>
                </body>
            </div>
        </div>
    </div>
</div>
<h2 style="color:#9d9d9d; " class="report-title">OER Alerts</h2>

    
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
    <?php foreach ($OerOverdueList as $oer) { ?>
        <tr>
            
            <th><?= $oer->id; ?></th>
            <th><?= $oer->rank; ?></th>
            <th><?=  $oer->first_name." ".$oer->last_name?></th>
            <th><?= $oer->rater; ?></th>
            <th><?= $oer->due; ?></th>
            <th>Overdue</th>
        <?php } ?>
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
   
<h2 style="color:#9d9d9d;">NCOER Alerts</h2>

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
    <?php foreach ($NcoerOverdueList as $ncoer) { ?>
        <tr>
            <?php  $user = $s->getUserById($id,$dbcon);?>
            <th><?= $ncoer->id; ?></th>
            <th><?= $ncoer->rank; ?></th>
            <th><?= $user->first_name." ".$user->last_name; ?></th>
            <th><?= $ncoer->rater; ?></th>
            <th><?= $ncoer->due; ?></th>
            <th>Overdue</th>
        </tr>
    <?php } ?>
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

