<?php
require_once "../Models/WeaponQualification.php";
require_once "../Models/DatabaseContext.php";

$dbcon = DatabaseContext::dbConnect();
$wq = new WeaponQualification();

$dateErr = $nDateErr = $hitsErr = $qualificationErr = null;

if(isset($_POST['updateWeaponQualification'])){
    $id = $_POST['id'];
    $wqs = $wq->getAllWeaponQualificationById($dbcon, $id);
    $date = $wqs->date;
    $nextDate = $wqs->next_date;
    $hits = $wqs->hits;
    $qualifications = $wqs->qualification;
}

if(!isset($_POST['updateWeaponQualification']) && !isset($_POST['wq_update']) && !isset($_POST['id'])){
    header('Location: weapons_qualification.php?id='.$_POST['weaponId'].'&name='.$_POST['weaponName']);
}

function validateFields($date, $next_date, $hits, $qualification){
    global $dateErr, $nDateErr, $hitsErr, $qualificationErr;
    $validationError = false;
    if(empty($date)){
        $dateErr = "Enter a valid date";
        $validationError = true;
    }
    if(empty($next_date)){
        $nDateErr = "Enter a valid next date";
        $validationError = true;
    }
    if(empty($hits)){
        $hitsErr = "Enter a valid hits";
        $validationError = true;
    }
    if(empty($qualification)){
        $qualificationErr = "Enter a valid qualification";
        $validationError = true;
    }
    return $validationError;
}

if (isset($_POST['wq_update'])){
    $id = $_POST['wq_id'];
    $date = $_POST['date'];
    $nextDate = $_POST['nextDate'];
    $hits = $_POST['hits'];
    $qualifications = $_POST['qualifications'];

    $validationError = validateFields($date, $nextDate, $hits, $qualifications);

    if(!$validationError){
        $count = $wq->updateWeaponQualification($dbcon, $id, $date, $nextDate, $hits, $qualifications);
        if($count){
           header('Location: weapons_qualification.php?id='.$_POST['weaponId'].'&name='.$_POST['weaponName']);
        } else {
            echo "<p class='not-found'>Problem Updating Weapons Qualification<p>";
        }
    }
}

?>
<div class="container">
    <h2 class="report-title">Update Weapons Qualification Page</h2>
    <form method="POST" class="center-form">
        <input type="hidden" name="wq_id" value="<?= $id; ?>"/>
        <input type="hidden" name="weaponId" value="<?= $_POST['weaponId']; ?>"/>
        <input type="hidden" name="weaponName" value="<?= $_POST['weaponName']; ?>"/>
        <div class="form-group">
            <label class="label label-default" for="wq_date">Date</label>
            <input type="date" class="form-control" name="date" id="wq_date" value="<?= $date; ?>"/>
            <div class="text-danger"><?= isset($dateErr) ? $dateErr   : ''; ?></div>
        </div>
        <div class="form-group">
            <label class="label label-default" for="wq_nextDate">Next Date</label>
            <input type="date" class="form-control" name="nextDate" id="wq_nextDate" value="<?= $nextDate; ?>"/>
            <div class="text-danger"><?= isset($nDateErr) ? $nDateErr   : ''; ?></div>
        </div>
        <div class="form-group">
            <label class="label label-default" for="wq_hits">Hits</label>
            <input type="number" min=0 class="form-control" name="hits" id="wq_hits" value="<?= $hits; ?>"/>
            <div class="text-danger"><?= isset($hitsErr) ? $hitsErr   : ''; ?></div>
        </div>
        <div class="form-group">
            <label class="label label-default" for="wq_qualifications">Qualification</label>
            <input type="text" class="form-control" name="qualifications" id="wq_qualifications" value="<?= $qualifications; ?>"/>
            <div class="text-danger"><?= isset($qualificationErr) ? $qualificationErr   : ''; ?></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="submit" value="Update" name="wq_update" class="btn btn-success col-md-12"/>
            </div>
            <div class="form-group col-md-4">
                <a href=<?='weapons_qualification.php?id='.$_POST['weaponId'].'&name='.$_POST['weaponName']?> class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>