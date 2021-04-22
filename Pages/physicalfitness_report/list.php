<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$db = DatabaseContext::dbConnect();

$FitnessReportDto = new FitnessReport();

if($_SESSION['usertype'] == "admin"){

  $searchKey = isset($_GET['search']) ? $_GET['search'] : null;

  if(isset($_GET['search']) && $searchKey){

    $FitnessReportList = $FitnessReportDto->SearchFitnessReport($db, $searchKey);

  }else {

  $FitnessReportList = $FitnessReportDto->GenerateFitnessReport($db);

  }
} else if($_SESSION['usertype'] == "user"){

  $FitnessReportList = $FitnessReportDto->getFitnessReportByUserId($_SESSION['userid'],$db);

}
?>

<div class="container fitness-report">
<h2 class="report-title">Physical Fitness Report</h2>
<?php if($_SESSION['usertype'] == "admin") { ?>
    <form class="form-inline fitness-report-search" method="GET">
          <input type="text" class="form-control" id="fitness-report-search_input" name="search" placeholder="Search By Name">
          <input type="submit" value ="Search" class="btn btn-success"/>
    </form>
<?php
  }
?>
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
        <?php if($_SESSION['usertype'] == "admin") { ?>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        <?php
          }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach($FitnessReportList as $Report) { ?>
    <tr>
        <td><?= $Report->rank?></td>
        <td><?= $Report->first_name?></td>
        <td><?= $Report->last_name?></td>
        <td><?= $Report->dob?></td>
        <td><?= $Report->date?></td>
        <td><?= $Report->MDL?></td>
        <td><?= $Report->SPT?></td>
        <td><?= $Report->HRP?></td>
        <td><?= $Report->SDC?></td>
        <td><?= $Report->LTK?></td>
        <td><?= $Report->MDL?></td>
        <td><?= $Report->total?></td>
        <td><?= $Report->demand_category?></td>
        <?php if($_SESSION['usertype'] == "admin") { ?>
        <td>
            <form action="physicalFitness_update.php" method="get">
                <input type="hidden" name="id" value="<?=$Report->id?>"/>
                <input type="submit" class="button btn btn-primary" name="fitness-report_update" value="Update"/>
            </form>
        </td>
        <td>
            <form action="physicalFitness_deleteconfirm.php" method="get">
                <input type="hidden" name="id" value="<?=$Report->id?>"/>
                <input type="submit" class="button btn btn-danger" name="fitness-report_delete" value="Delete"/>
            </form>
        </td>
        <?php
          }
        ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php if($_SESSION['usertype'] == "admin") { ?>
  <a href="./physicalFitness_add.php" id="Fitness_Add" class="btn btn-success btn-lg float-right">Add Soldier</a>
  <?php
          }
  ?>
</div>
</div>


