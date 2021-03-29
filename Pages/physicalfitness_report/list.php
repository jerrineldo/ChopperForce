<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



$db = DatabaseContext::dbConnect();

$FitnessReportDto = new FitnessReport();
$FitnessReportList = $FitnessReportDto->GenerateFitnessReport($db);


?>


<h2 class="report-title">Physical Fitness Report</h2>
<div class="m-1">
  <table class="table table-bordered tbl">
    <thead>
    <tr>
        <th scope="col">Rank</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Date</th>
        <th scope="col">MDL</th>
        <th scope="col">SPT</th>
        <th scope="col">HRP</th>
        <th scope="col">SDC</th>
        <th scope="col">LTK</th>
        <th scope="col">2MR</th>
        <th scope="col">Total</th>
        <th scope="col">Fitness Category</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($FitnessReportList as $Report) { ?>
    <tr>
        <td><?= $Report->rank?></td>
        <td><?= $Report->first_name?></td>
        <td><?= $Report->last_name?></td>
        <td><?= $Report->dob?></td>
        <td>19 March 2021</td>
        <td><?= $Report->MDL?></td>
        <td><?= $Report->SPT?></td>
        <td><?= $Report->HRP?></td>
        <td><?= $Report->SDC?></td>
        <td><?= $Report->LTK?></td>
        <td><?= $Report->MDL?></td>
        <td><?= $Report->total?></td>
        <td><?= $Report->demand_category?></td>
        <td>
            <form action="physicalFitness_update.php" method="get">
                <input type="hidden" name="id" value="<?=$Report->id?>"/>
                <input type="submit" class="button btn btn-primary" name="fitness-report_update" value="Update"/>
            </form>
        </td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value=""/>
                <input type="submit" class="button btn btn-danger" name="fitness-report_delete" value="Delete"/>
            </form>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="" id="Fitness_Add" class="btn btn-success btn-lg float-right">Add Soldier</a>
</div>


