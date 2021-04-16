
<!--Use DB Data to generate quantities of people-->
<?php
   require_once "../Models/OER.php";
   require_once "../Models/NCOER.php";

   require_once "../Models/DatabaseContext.php";
$dbcon= DatabaseContext::dbConnect();//DatabaseContext
$s = new Oer();
$oers = $s->getAllUpcommingOers(DatabaseContext::dbConnect());
$s = new Ncoer();
$ncoers = $s->getUpcommingNcoers(DatabaseContext::dbConnect());

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


    
<!--    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">OER_ID</th>
            <th scope="col">Rank </th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Rater</th>
            <th scope="col">Due</th>
        </tr>
        </thead>
        <tbody>
        <?php /*foreach ($oers as $oer) { */?>
        <tr>
            <th><?/*= $oer->id; */?></th>
            <th><?/*= $oer->rank; */?></th>
            <th><?/*= $oer->first_name; */?></th>
            <th><?/*= $oer->last_name; */?></th>
            <th><?/*= $oer->rater; */?></th>
            <th><?/*= $oer->due; */?></th>
        <?php /*} */?>
        </tbody>
    </table>-->
    <div class="m-1">
    <h4 id="rosterTitle"  class="report-title">Upcoming NCOER</h4>

        <table class="table" style="color:#9d9d9d; background-color:#fff;">
            <thead>
            <tr class="table-light">
                <th scope="col">OER_ID</th>
                <th scope="col">Rank </th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Rater</th>
                <th scope="col">Due</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($oers as $oer) {?>
            <tr class="table-white">
                <th><?= $oer->id;?></th>
                <th><?= $oer->rank;?></th>
                <th><?= $oer->first_name;?></th>
                <th><?= $oer->last_name;?></th>
                <th><?= $oer->rater;?></th>
                <th><?= $oer->due;?></th>
            </tr>
            <?php }?>
            </tbody>
        </table>



<!--    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">NCOER_ID</th>
            <th scope="col">Rank </th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Rater</th>
            <th scope="col">Senior Rater</th>
            <th scope="col">Reviewer</th>
            <th scope="col">Last NCOER</th>
            <th scope="col">THRU Date</th>
            <th scope="col">Due</th>
            <th scope="col">Type</th>
            <th scope="col">Remarks</th>
        </tr>
        </thead>
        <tbody>
        <?php /*foreach ($ncoers as $ncoer) { */?>
            <tr>
                <th><?/*= $ncoer->id; */?></th>
                <th><?/*= $ncoer->rank; */?></th>
                <th><?/*= $ncoer->first_name; */?></th>
                <th><?/*= $ncoer->last_name; */?></th>
                <th><?/*= $ncoer->rater; */?></th>
                <th><?/*= $ncoer->senior_rater; */?></th>
                <th><?/*= $ncoer->reviewer; */?></th>
                <th><?/*= $ncoer->last_ncoer; */?></th>
                <th><?/*= $ncoer->thru_date; */?></th>
                <th><?/*= $ncoer->due; */?></th>
                <th><?/*= $ncoer->type; */?></th>
                <th><?/*= $ncoer->remarks; */?></th>
            </tr>

        <?php /*} */?>
        </tbody>
    </table>-->
    <br>
    <br>
    <br>
</div>
