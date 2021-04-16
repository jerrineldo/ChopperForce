<?php
require_once "../Models/DatabaseContext.php";
require_once "../Models/Dutie.php";


$dbcon= DatabaseContext::dbConnect();//DatabaseContext
$s = new Dutie();


if(isset($_POST['addDutie'])){
    
    $qualifications_category_name=$_POST ['qualifications_category_name'];
    

    
    $db = DatabaseContext::dbConnect();
    $s = new Dutie();
    $c = $s->addDutie($qualifications_category_name,$db);
    if($c){
        header("Location:duties_report_list.php ");    


    }
    else{
        echo "problem adding car";
    }
};

?>


<html lang="en">
<h1>Add a new Qualification/Duty </h1>
<head>
    <title>Add Qualification/Duty</title>
    
</head>

<body>

<!-- <div>
       Form to Add  Qualification/Duty -->
    <form action="" method="post">

  
        <div class="form-group">
            <label for="user_id">Duty Name</label>
            <input type="text" class="form-control" id="user_id" name="qualifications_category_name"
                   value="" placeholder="Enter the name of the duty">
            <span style="color: red">


        <a href="./duties_report_list.php" id="btn_back" class="btn btn-primary float-right">Back</a>
        <button type="submit"  class="btn btn-success float-left" name="addDutie"
                 id="btn-submit">
            Add Qualification/Duty
        </button>
    </form>
</div> 


</body>
</html>