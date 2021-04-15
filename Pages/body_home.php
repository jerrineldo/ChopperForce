
<!--Use DB Data to generate quantities of people-->
<?php
   require_once "../Models/OER.php";
   require_once "../Models/NCOER.php";
   require_once "../Models/User.php";

   require_once "../Models/DatabaseContext.php";
$dbcon= DatabaseContext::dbConnect();//DatabaseContext
$s = new Oer();
$oers = $s->getAllUpcommingOers(DatabaseContext::dbConnect());
$s = new Ncoer();
$ncoers = $s->getUpcommingNcoers(DatabaseContext::dbConnect());
$s = new User();
$Users = $s->getAllUsesByRank(DatabaseContext::dbConnect());
?>

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
            </div>
        </div>
    </div>
</div>
<h2 style="color:#9d9d9d; " class="report-title">Upcoming OER</h2>

    
<table class="table" style="color:#9d9d9d;">        <thead>
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

    <table class="table" style="color:#9d9d9d; ">        <thead>
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
