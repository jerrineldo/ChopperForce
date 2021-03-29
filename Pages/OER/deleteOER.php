<?php
require_once '../../Models/DatabaseContext.php';
require_once '../../Models/OER.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $dbcon= DatabaseContext::dbConnect();
    $s = new Oer();
    $count = $s->deleteOer($id, $dbcon);
    if($count){
        header("Location: ../oer_report.php");
    }
    else {
        echo " problem deleting";
    }
}
