<?php
require_once "../Models/DatabaseContext.php";
require_once "../Models/Award.php";
require_once "../Library/form-functions.php";

$dbcon= DatabaseContext::dbConnect();//DatabaseContext
$s = new Award();
//DO THIS TO USERS
$user_id = $s->getUsers(DatabaseContext::dbConnect());
//$user_id,$recommender,$award,$reason,$present,$days,$remarks

if(isset($_POST['addAward'])){//MAKE THIS MATCH BUTTON
    
    $user_id=$_POST ['user_id'];
    $recommender=$_POST ['recommender'];
    $award=$_POST ['award'];
    $reason=$_POST ['reason'];
    $present=$_POST ['present'];
    $days=$_POST ['days'];
    $remarks=$_POST ['remarks'];

    
    $db = DatabaseContext::dbConnect();
    $s = new Award();
    $c = $s->addAward($user_id,$recommender,$award,$reason,$present,$days,$remarks,$db);
    if($c){
        echo"added";

    }
    else{
        echo "problem adding car";
    }
};

?>


<html lang="en">
<h1>Add a new Award Recipient </h1>
<head>
    <title>Add Award</title>
    
</head>

<body>

<!-- <div>
       Form to Add  award -->
    <form action="" method="post">

        <!-- <div class="form-group">
            <label for="name">Make :</label> 
            <select  class="form-control" name="make" id="make" value="">
                <?php// echo PopulateDropwdown($makes) ?>
            <span style="color: red">

            </span> 
        </div>-->
        <!-- $remarks,$db -->
        <div class="form-group">
            <label for="user_id">user_id :</label>
            <!-- <input type="text" class="form-control" id="user_id" name="user_id"
                   value="" placeholder="Enter user ID">
            <span style="color: red"> -->

            <select  class="form-control" name="user_id" id="user_id" value="">
                <?php echo PopulateDropwdownSoldier($user_id) ?>
           </select>
        </div>
        <div class="form-group">
            <label for="recommender">recommender :</label>
            <input type="text" name="recommender" value="" class="form-control"
                   id="recommender" placeholder="Enter recommender">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="award">Award :</label>
            <input type="text" name="award" value="" class="form-control"
                   id="award" placeholder="Enter Award">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="reason">Reason :</label>
            <input type="text" name="reason" value="" class="form-control"
                   id="reason" placeholder="Enter Reason">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="present">Present :</label>
            <input type="text" name="present" value="" class="form-control"
                   id="present">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="days">Days :</label>
            <input type="date" name="days" value="" class="form-control"
                   id="days">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks :</label>
            <input type="text" name="remarks" value="" class="form-control"
                   id="remarks">
            <span style="color: red">

            </span>
        </div>

        <a href="award_report_list.php" id="btn_back" class="btn btn-primary float-left">Back</a>
        <button type="submit" name="addAward"
        class="btn btn-success" id="btn-submit">
            Add Award
        </button>
    </form>
</div> 


</body>
</html>