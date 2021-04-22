<?php

session_start();

?>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php">
                <img src="../Images/logo.png.png" id ="logo" class="d-inline-block align-top" alt="army logo">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="data_entery_form.php">Add New</a></li>
            <li><a href="#">Data</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="personnel_report.php">Personnel</a></li>
                    <li><a href="family_contact.php">Family Contacts</a></li>
                    <li><a href="emergency_contact.php">Emergency Contact</a></li>
                    <li><a href="oer_report.php">OER Report</a></li>
                    <li><a href="ncoer_report.php">NCOER Report</a></li>
                    <li><a href="#">ACFT</a></li>
                    <li><a href="weapons.php">Weapons</a></li>
                    <li><a href="duties_report_list.php">Qualifications/Duties Report</a></li>
                    <li><a href="physicalFitness.php">Physical Fitness Report</a></li>
                    <li><a href="award_report_list.php">Awards Report</a></li>
                    <li><a href="duties_report_list.php">Duties Report</a></li>

                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>
            <?php if(isset($_SESSION['loggedin'])) { ?>
                <span class="navbar-text">
                    <h4 class="navbar-username">Hello  <?php echo $_SESSION['username'] ?></h4>
                </span>
                <li>
                <form action="" method="POST" name="logout-form">
                    <input type="submit" name="logout-form_button" value="Logout" class="btn btn-primary logout-form_button">
                </form>
                </li>
            <?php } else { ?>
                <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php } ?>
            
        </ul>
    </div>
</nav>
<!--Asia Levesque-->


<?php

    //Unset all the session varibles made.
    if(isset($_POST['logout-form_button'])) {

        unset($_SESSION['username']);
        unset($_SESSION['usertype']);
        unset($_SESSION['loggedin']);
        unset($_SESSION['userid']);
        header("Location: Logout.php");

    }

?>