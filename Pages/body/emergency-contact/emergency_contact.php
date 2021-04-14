<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once "../Models/EmergencyContact.php";
require_once "../Models/DatabaseContext.php";

$dbcon = DatabaseContext::dbConnect();
$ec = new EmergencyContact();


$searchKey = isset($_GET['search']) ? $_GET['search'] : null;
$isGoBack = false;
if(isset($_POST['deleteEC'])){
    $id = $_POST['id'];
    $count = $ec->removeEmergencyContactByID($dbcon, $id);
    if($count){
        header('Location: emergency_contact.php');
     } else {
         echo "<p class='not-found'>Problem Deleting Emeregency Contact<p>";
     }
}
if(isset($_GET['search']) && $searchKey){
    $isGoBack = true;
    $ecList = $ec->searchEmergencyContact($dbcon, $searchKey);
}else {
    $ecList = $ec->getAllEmergencyContact($dbcon);
}
?>

<div class="container report_page">
    <h2 class="report-title">Emergency Contact Report</h2>
    <form class="form-inline report_page-search">
        <input type="text" class="form-control" id="eg_search" name="search" placeholder="Search By Name">
        <button type="submit" class="btn btn-success">Search</button>
    </form>
    <?php
        if(count($ecList) === 0){
            echo("<p class='not-found'>No Results Found<p>");
        }else {
    ?>
    <table class="table table-dark table-striped table-responsive tbl__frg">
        <thead>
            <tr>
                <th scope="col">PLT</th>
                <th scope="col">Rank</th>
                <th scope="col">Full Name</th>
                <th scope="col">Contact Person Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        <thead>
        <tbody>
            <?php foreach ($ecList as $contact) { ?>
                <tr>
                    <td><?= $contact->plt; ?></td>
                    <td><?= $contact->rank; ?></td>
                    <td><?= $contact->full_name; ?></td>
                    <td><?= $contact->contact_name; ?></td>
                    <td><?= $contact->phone; ?></td>
                    <td><?= $contact->email; ?></td>
                    <td>
                        <form action="update_contact.php" method="POST">
                            <input type="hidden" name="id" value="<?= $contact->id; ?>"/>
                            <input type="hidden" name="fullName" value="<?= $contact->full_name; ?>"/>
                            <input type="submit" class="button btn btn-primary" name="updateEC" value="Update"/>
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $contact->id; ?>"/>
                            <input type="submit" class="button btn btn-danger" name="deleteEC" value="Delete"/>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
    <?php 
        if($isGoBack){
            echo("<a href='emergency_contact.php' class='btn btn-danger' >Go Back</a>");
        }
    ?>
</div>