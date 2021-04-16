<?php 
require_once "../../Models/DatabaseContext.php";
require_once "../../Models/Award.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $dbcon= DatabaseContext::dbConnect();//DatabaseContext
    $s = new Award();
    $count = $s->deleteAward($id, $dbcon);
//check to see if its working first if(isset($_POST['id'])){
// $id=$_POST['id'];
// echo $id;
//}
    if($count){
        header("location:../award_report_list.php");
    }else{
        echo"Problem deleting Car";
    }
}
?>