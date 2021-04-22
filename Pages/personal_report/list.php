<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$db = DatabaseContext::dbConnect();

$PersonalDto = new User();

if($_SESSION['usertype'] == "admin"){

  $searchKey = isset($_GET['search']) ? $_GET['search'] : null;

  if(isset($_GET['search']) && $searchKey){
    
    $CompanyList = $PersonalDto->searchUser($db, $searchKey);
    var_dump($CompanyList);
  
  } else {

    $CompanyList = $PersonalDto->getAllUsers($db);
  
  }
  

} else if($_SESSION['usertype'] == "user"){

  $CompanyList = $PersonalDto->getUserByUserId($_SESSION['userid'],$db);
}

?>
<div class="container personnelreport">
  <h2 class="report-title">Personnel Report</h2>
  <?php if($_SESSION['usertype'] == "admin") { ?>
    <form class="form-inline personnelreport-search" method="GET">
          <input type="text" class="form-control" id="personnelreport-search_input" name="search" placeholder="Search By Name">
          <input type="submit" value ="Search" class="btn btn-success"/>
    </form>
  <?php
    }
  ?>
  <div class="m-1">
    <table class="table table-bordered tbl">
      <thead>
        <tr>
          <th scope="col">MOS</th>
          <th scope="col">Rank</th>
          <th scope="col">Last Name</th>
          <th scope="col">First Name</th>
          <th scope="col">SSN</th>
          <th scope="col">DOD ID</th>
          <th scope="col">Bloodtype</th>
          <th scope="col">DOB</th>
          <th scope="col">Address</th>
          <th scope="col">Update</th>
          <?php if($_SESSION['usertype'] == "admin") { ?>
          <th scope="col">Delete</th>
          <?php
          }
          ?>
        </tr>
      </thead>
      <tbody>
      <?php foreach($CompanyList as $Soldier) { // Loop through the results and show them?>
        <tr>
          <td><?= $Soldier->mos ?></td>
          <td><?= $Soldier->rank ?></td>
          <td><?= $Soldier->first_name ?></td>
          <td><?= $Soldier->last_name ?></td>
          <td><?= $Soldier->ssn //Should this be plaintext? ?></td>
          <td><?= $Soldier->dod_id ?></td>
          <td><?= $Soldier->blood_type ?></td>
          <td><?= $Soldier->dob ?></td>
          <td><?= $Soldier->address ?></td>  
          <td>
            <form action="personnel_update.php" method="get">
                  <input type="hidden" name="id" value="<?=$Soldier->id?>"/>
                  <input type="submit" class="button btn btn-primary" name="updateSoldier" value="Update"/>
            </form>
          </td>
          <?php if($_SESSION['usertype'] == "admin") { ?>
          <td>
              <form action="personnel_deleteconfirm.php" method="GET">
                  <input type="hidden" name="id" value="<?=$Soldier->id?>"/>
                  <input type="submit" class="button btn btn-danger" name="deleteSoldier" value="Delete"/>
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
    <a href="./personnel_add.php" id="Personnel_Add" class="btn btn-success btn-lg float-right">Add Soldier</a>
    <?php
          }
    ?>
  </div>
</div>