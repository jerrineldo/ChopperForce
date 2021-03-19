<?php include 'header.php'; include 'nav.php';?>
<link rel="stylesheet" href="../Stylesheets/reports_page.css">
<!--TODO ADD INFO-->
<div class="m-1">
  <table class="table table-bordered tbl">
    <thead>
      <tr>
        <th scope="col">Alert Priority</th>
        <th scope="col">Alert Description</th>
        <th scope="col">Soldier Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>10</td>
        <td>Birthday</td>
        <td>Tyler, Elliot</td><!-- Eventually will use names pulled from database -->
        <td><a href="#" class="button btn btn-primary">Details</a></td><!-- Takes user to generated page with actions to resolve -->
      </tr>
    </tbody>
  </table>
</div>
<?php include "footer.php"; ?>
