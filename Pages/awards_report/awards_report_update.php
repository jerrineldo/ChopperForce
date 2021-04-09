<?php 
require_once "../Models/DatabaseContext.php";
require_once "../Models/Award.php";
$user_id=$recommender=$award2=$reason=$present=$days=$remarks="";
// $s2 = new Award();

// $user_id = $s2->getUsers(DatabaseContext::dbConnect());



if(isset($_POST['updateAward'])){
    $id= $_POST['id'];
    // var_dump($id);
    $dbcon= DatabaseContext::dbConnect();
    var_dump($_POST);

    $s = new Award();
    $award = $s->getAwardsById($id, $dbcon);
    var_dump($award);
    $user_id=$award->user_id;
    $recommender=$award->recommender;
    $award2=$award->award;
    $reason=$award->reason;
    $present=$award->present;
    $days=$award->days;
    $remarks=$award->remarks;


    // var_dump($car);
    // var_dump($id);
}

if(isset($_POST['updAward'])){
    $id=$_POST['sid'];
    
    var_dump($_POST);

    $user_id=$_POST['user_id'];
    $recommender=$_POST['recommender'];
    $award=$_POST['award'];
    $reason=$_POST['reason'];
    $present=$_POST['present'];
    $days=$_POST['days'];
    $remarks=$_POST['remarks'];

    $dbcon= DatabaseContext::dbConnect();
    $s = new Award();
    $count = $s->updateAward($id,$user_id,$recommender,$award,$reason,$present,$days,$remarks,$dbcon);

    if($count){
        // header("location:list-cars.php");
    }else{
        echo"Problem updating car";
    }


}
?>


<html lang="en">
<h1>Update Award </h1>
<head>
    <title>Add Award</title>
    
</head>

<body>

<!-- <div>
       Form to Add  award -->
    <form action="" method="POST">

        <!-- <div class="form-group">
            <label for="name">Make :</label> 
            <select  class="form-control" name="make" id="make" value="">
                <?php// echo PopulateDropwdown($makes) ?>
            <span style="color: red">

            </span> 
        </div>-->
        <!-- $remarks,$db -->
        <input type="hidden" name="sid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="user_id"class="report-title">user_id :</label>
            <input type="text" class="form-control" id="user_id" name="user_id"
                   value="<?=$user_id;?>" placeholder="Enter user ID">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="recommender"class="report-title">recommender :</label>
            <input type="text" name="recommender" value="<?= $recommender; ?>" class="form-control"
                   id="recommender" placeholder="Enter recommender">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="award"class="report-title">Award :</label>
            <input type="text" name="award" value="<?= $award2; ?>" class="form-control"
                   id="award" placeholder="Enter Award">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="reason"class="report-title">Reason :</label>
            <input type="text" name="reason" value="<?= $reason; ?>" class="form-control"
                   id="reason" placeholder="Enter Reason">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="present"class="report-title">Present :</label>
            <input type="text" name="present" value="<?= $present; ?>" class="form-control"
                   id="present">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="days"class="report-title">Days :</label>
            <input type="date" name="days" value="<?= $days; ?>" class="form-control"
                   id="days">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="remarks"class="report-title">Remarks :</label>
            <input type="text" name="remarks" value="<?= $remarks; ?>" class="form-control"
                   id="remarks">
            <span style="color: red">

            </span>
        </div>

        <a href="./list-cars.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updAward"
                class="btn btn-primary float-right" id="btn-submit">
            Update Award
        </button>
    </form>
</div> 


</body>
</html>