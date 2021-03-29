<?php
require_once "../Models/FamilyContact.php";
require_once "../Models/DatabaseContext.php";

$dbcon = DatabaseContext::dbConnect();
$fc = new FamilyContact();


$searchKey = isset($_GET['search']) ? $_GET['search'] : null;

if(isset($_POST['deleteFC'])){
    $id = $_POST['id'];
    $count = $fc->removeFamilyContacts($dbcon, $id);
    if($count){
        header('Location: family_contact.php');
     } else {
         echo "<p class='not-found'>Problem Deleting Family Contact<p>";
     }
}
if(isset($_GET['search']) && $searchKey){
    $fcList = $fc->searchFamilyContacts($dbcon, $searchKey);
}else {
    $fcList = $fc->getAllFamilyContacts($dbcon);
}
?>


<div class="container report_page">
    <h2 class="report-title">Family Contacts Report</h2>
    <form class="form-inline report_page-search" method="GET">
        <input type="text" class="form-control" id="frg_search" name="search" placeholder="Search By Name">
        <input type="submit" value="Search" class="btn btn-success"/>
    </form>

    <?php
        if(count($fcList) === 0){
            echo("
            <p class='not-found'>No Results Found<p>
            <a href='family_contact.php' class='btn btn-danger col-md-12' >Go Back</a>
            ");
        }else {
    ?>
        <table class="table table-dark table-striped table-responsive tbl__frg">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Family Member Name</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Family Member Mailing Address</th>
                    <th scope="col">Preference Form</th>
                    <th scope="col">Physical Location(if Different)</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            <thead>
            <tbody>
                <?php foreach ($fcList as $contact) { ?>
                    <tr>
                        <td><?= $contact->userId; ?></td>
                        <td><?= $contact->full_name; ?></td>
                        <td><?= $contact->rank; ?></td>
                        <td><?= $contact->member_name; ?></td>
                        <td><?= $contact->relationship; ?></td>
                        <td><?= $contact->phone; ?></td>
                        <td><?= $contact->email; ?></td>
                        <td><?= $contact->address; ?></td>
                        <td><?= $contact->preference_form ? 'Yes' : 'No'; ?></td>
                        <td><?= $contact->physical_location; ?></td>
                        <td>
                            <form action="fc_update.php" method="POST">
                                <input type="hidden" name="id" value="<?= $contact->id; ?>"/>
                                <input type="submit" class="button btn btn-primary" name="updateFC" value="Update"/>
                            </form>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $contact->id; ?>"/>
                                <input type="submit" class="button btn btn-danger" name="deleteFC" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>