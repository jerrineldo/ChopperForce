<?php


?>
<!--
Form By Journey
    !-->
    <body>
<link rel="stylesheet" href="../Stylesheets/form.css">
<link rel="stylesheet" href="../Stylesheets/reports_page.css">

<h1 class="report-title">Awards Report Page</h1>
<table class="table table-bordered tbl tbl__frg">
    <thead>
        <tr>
            <th>Award Id</th>
            <th>Award Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John H Merrit Award</td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value=""/>
                    <input type="submit" class="button btn btn-primary" name="updateAward" value="Update"/>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="">
                    <input type="submit" class="button btn btn-danger" name="deleteAward" value="Delete"/>
                </form>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Advanced flying awards</td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value=""/>
                    <input type="submit" class="button btn btn-primary" name="updateAward" value="Update"/>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="">
                    <input type="submit" class="button btn btn-danger" name="deleteAward" value="Delete"/>
                </form>
            </td>
        </tr>
    </tbody>
</table>
</body>