<?php
// Developed by Luis
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$db = DatabaseContext::dbConnect();

$user_id = $_GET['id'];
$fitnessReport = new fitnessReport();
$emergencyContacts = new EmergencyContact();
$familyContacts = new familyContact();
$awards = new Award();
$duty = new Dutie();
$user = new User();

$fitnessReport = $fitnessReport->getFitnessReportById($user_id,$db);
$emergencyContacts = $emergencyContacts->getEmergencyContactByID($db,$user_id);
$familyContacts = $familyContacts->getFamilyContactByID($db,$user_id);
$awards = $awards->getAwardsById($user_id,$db);
$duty = $duty->getDutieById($user_id,$db);
$user = $user->getUserById($user_id,$db);
?>
<main>
    <div class="form-group col-md-4">
        <a href="./personnel_report.php" class="btn btn-primary col-md-12" >Go Back</a>
    </div>
    <h1><?=$user->first_name." ".$user->last_name?> Details</h1>
    <section id="userInfo">
        <h2>User Info</h2>
        <div class="m-1">
            <table class="table table-bordered tbl">
                <thead>
                    <tr>
                        <th scope="col">MOS</th>
                        <th scope="col">Rank</th>
                        <th scope="col">SSN</th>
                        <th scope="col">DOD ID</th>
                        <th scope="col">Bloodtype</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $user->mos ?></td>
                        <td><?= $user->rank ?></td>
                        <td><?= $user->ssn //Should this be plaintext? ?></td>
                        <td><?= $user->dod_id ?></td>
                        <td><?= $user->blood_type ?></td>
                        <td><?= $user->dob ?></td>
                        <td><?= $user->address ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <?php if($duty != false) { ?>
    <section id="duties">
        <h2>Duties</h2>
        <table class="table table-bordered tbl tbl__frg">
            <thead>
                <tr>
                    <th>Duty/ Qualification Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $duty->qualifications_category_name; ?></td>
                </tr>
            </tbody>
        </table>
    </section>
    <?php } ?>
    <?php if($awards != false) { ?>
    <section id="awards">
        <h2>Awards</h2>
        <table class="table table-bordered tbl tbl__frg">
            <thead>
                <tr>
                    <th>Award Name</th>
                    <th>Present</th>
                    <th>Reason</th>
                    <th>Days</th>
                    <th>remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $awards->award; ?></td>
                    <td><?= $awards->present; ?></td>
                    <td><?= $awards->reason; ?></td>
                    <td><?= $awards->days; ?></td>
                    <td><?= $awards->remarks; ?></td>
                </tr>
            </tbody>
        </table>
    </section>
    <?php } ?>
    <?php if($emergencyContacts != false) { ?>
    <section id="emergContact">
        <h2>Emergency Contacts</h2>
        <table class="table table-dark table-striped table-responsive tbl__frg">
            <thead>
                <tr>
                    <th scope="col">PLT</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Contact Person Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            <thead>
            <tbody>
                    <tr>
                        <td><?= $emergencyContacts->first_name." ".$emergencyContacts->last_name; ?></td>
                        <td><?= $emergencyContacts->initial; ?></td>
                        <td><?= $emergencyContacts->phone; ?></td>
                        <td><?= $emergencyContacts->email; ?></td>
                    </tr>
            </tbody>
        </table>
    </section>
    <?php } ?>
    <?php if($familyContacts != false) { ?>
    <section id="familyContact">
        <h2>Family Members</h2>
        <table class="table table-dark table-striped table-responsive tbl__frg">
            <thead>
                <tr>
                    <th scope="col">Family Member Name</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Family Member Mailing Address</th>
                    <th scope="col">Preference Form</th>
                    <th scope="col">Physical Location(if Different)</th>
                </tr>
            <thead>
            <tbody>
                <tr>
                    <td><?=$familyContacts->first_name." ".$familyContacts->last_name?></td>
                    <td><?= $familyContacts->relationship; ?></td>
                    <td><?= $familyContacts->phone; ?></td>
                    <td><?= $familyContacts->email; ?></td>
                    <td><?= $familyContacts->address; ?></td>
                    <td><?= $familyContacts->preference_form ? 'Yes' : 'No'; ?></td>
                    <td><?= $familyContacts->physical_location; ?></td>
                </tr>
            </tbody>
        </table>
    </section>
    <?php } ?>
</main>

