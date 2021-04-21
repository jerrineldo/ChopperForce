<?php 
    require_once "../Models/WeaponQualification.php";    
    require_once "../Models/DatabaseContext.php";

    $dbcon = DatabaseContext::dbConnect();
    $wq = new WeaponQualification();
    $wn = "";
    $searchKey = isset($_GET['search']) ? $_GET['search'] : null;
    $isGoBack = false;
    
    if(!$_GET['id'] || !$_GET['name']){
        header('Location: weapons.php');
    }

    if(isset($_POST['deleteWeapon'])){
        $id = $_POST['id'];
        $count = $wq->deleteWeaponQualification($dbcon, $id);
        if($count) {
            header('Location: weapons_qualification.php');
        } else {
            echo "<p class='not-found'>Problem Deleting Weapons<p>";
        }
    }

    if(isset($_GET['search']) && $searchKey){
        $isGoBack = true;
        $wqList = $wq->searchWeaponQualification($dbcon, $_GET['id'], $searchKey);
    }else {
        $wqList = $wq->getAllWeaponQualification($dbcon, $_GET['id']);
    }

?>

<div class="container report_page">
    <h2 class="report-title">Weapon Qualifications: <?= $_GET['name'] ?></h2>
    <form class="form-inline report_page-search">
        <input type="text" class="form-control" id="frg_search" placeholder="Search By Name">
        <input type="submit" value="Search" class="btn btn-success"/>
        <a class="btn btn-danger back-button" href="weapons.php">Back to Weapons</a>
    </form>
    <?php
        if(count($wqList) === 0){
            echo("<p class='not-found'>No Results Found<p>");
        }else {
    ?>
    <table class="table table-dark table-striped table-responsive tbl__frg">
        <thead>
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Full Name</th>
                <th scope="col">Date</th>
                <th scope="col">Next Date</th>
                <th scope="col">Hits</th>
                <th scope="col">Qualification</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($wqList as $wq) { ?>
                    <tr>
                        <td><?= $wq->rank; ?></td>
                        <td><?= $wq->full_name; ?></td>
                        <td><?= $wq->date; ?></td>
                        <td><?= $wq->next_date; ?></td>
                        <td><?= $wq->hits; ?></td>
                        <td><?= $wq->qualification; ?></td>
                        <td>
                            <form action="wq_update.php" method="post">
                                <input type="hidden" name="id" value="<?= $wq->id; ?>"/>
                                <input type="hidden" name="weaponName" value="<?= $_GET['name'] ?>"/>
                                <input type="hidden" name="weaponId" value="<?= $_GET['id'] ?>"/>
                                <input type="submit" class="button btn btn-primary" name="updateWeaponQualification" value="Update"/>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $wq->id; ?>"/>
                                <input type="submit" class="button btn btn-danger" name="deleteWeaponQualification" value="Delete"/>
                            </form>
                        </td>
                    </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } ?>
    <?php 
        if($isGoBack){
            echo("<a href='weapons_qualification.php' class='btn btn-danger' >Go Back</a>");
        }
    ?>
</div>