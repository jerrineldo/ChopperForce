
<?php

require 'header.php';
require 'nav.php';
require '../stylesheets/form.css';


?>
<!--
Form By Journey
    !-->
<body>
<link rel="stylesheet" href="../Stylesheets/form.css">
<link rel="stylesheet" href="../Stylesheets/reports_page.css">

<h1 class="report-title">Qualifications / Duties</h1>
<table class="table table-bordered tbl tbl__frg">
    <thead>
        <tr>
            <th>Qualification / Dutie Id</th>
            <th>Qualification / Dutie</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Flight Qualification</td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value=""/>
                    <input type="submit" class="button btn btn-primary" name="updateQualificationDuty" value="Update"/>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="">
                    <input type="submit" class="button btn btn-danger" name="updateQualificationDuty" value="Delete"/>
                </form>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Clean up Duty</td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value=""/>
                    <input type="submit" class="button btn btn-primary" name="updateQualificationDuty" value="Update"/>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="">
                    <input type="submit" class="button btn btn-danger" name="updateQualificationDuty" value="Delete"/>
                </form>
            </td>
        </tr>
    </tbody>
</table>
</body>
<?php
require 'footer.php';
?>
