<?php


require_once 'Models/DatabaseContext.php';
require_once 'Models/OER.php';
//require_once 'Models/user.php';

/*require_once 'vendor/autoload.php';*/
/*$id, $user_id, $rank, $rater,
$int_rater, $senior_rater, $last_oer, $thru_date, $due, $type, $remarks*/

$id = $user_id = $rank = $rater = $int_rater = $senior_rater = $last_oer = $thru_date = $due = $type= $remarks = "";

if (isset($_POST['updateOER'])) {
    $id = $_POST['id'];
    $db = Database::getDb();

    $s = new OER();
    $OER = $s->getOERById($id, $db);
           $id = $OER->id;
           $user_id = $OER->user_id;
           $rank= $OER->rank;
           $rater = $OER->rater;
            $int_rater = $OER->int_rater;
            $senior_rater= $OER->senior_rater;
            $last_oer = $OER->last_oer;
            $thru_date = $OER->thru_date;
            $due= $OER->due;
            $type= $OER->type;
            $remarks=$OER->remarks;

}
if (isset($_POST['updOER'])) {
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $rank = $_POST['rank'];
    $rater = $_POST['rater'];
    $int_rater = $_POST['int_rater'];
    $senior_rater = $_POST['senior_rater'];
    $last_oer = $_POST['last_oer'];
    $thru_date = $_POST['thru_date'];
    $due = $_POST['due'];
    $type = $_POST['type'];
    $remarks = $_POST['remarks'];


    $db = Database::getDb();
    $s = new OER();
    $count = $s->updateOER($id, $user_id, $rank, $rater, $int_rater, $senior_rater, $last_oer, $thru_date, $due, $type, $remarks);

    if ($count) {
        header('Location:  oer_report_list.php');
    } else {
        echo "Large and Incharge problem";
    }
}


?>

<html lang="en">

<head>
    <title>Update Car - Car Vroom Vroom System</title>
    <meta name="description" content="Car Vroom Vroom System">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/car.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Update  Student -->
    <form action="" method="post">
        <input type="hidden" name="sid" value="<?= $id; ?>"/>
        <div class="form-group">
            <label for="make">Make :</label>
            <input type="text" name="make" value="<?= $make; ?>" class="form-control"
                   id="program" placeholder="Enter program">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="model">Model :</label>
            <input type="text" class="form-control" name="model" id="model" value="<?= $model; ?>"
                   placeholder="Enter Model">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="year">Year :</label>
            <input type="text" class="form-control" id="year" name="year"
                   value="<?= $year; ?>" placeholder="Enter year">
            <span style="color: red">

            </span>
        </div>

        <a href="oer_report_list.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updCar"
                class="btn btn-primary float-right" id="btn-submit">
            Update Car
        </button>
    </form>
</div>


</body>
</html