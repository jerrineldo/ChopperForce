

<div class="container">
    <h2 class="report-title">Personnel Report - Update</h2>
    <form method="POST" name="personnel-update">
        <div class="form-row">
          <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_MOS">MOS:</label>
                <input type="text" class="form-control" id="personnel-update_MOS" placeholder="MOS">
          </div>
          <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_Rank">Rank:</label>
                <input type="text" class="form-control" id="personnel-update_Rank" placeholder="Rank">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_fName">First Name:</label>
                <input type="text" class="form-control" id="personnel-update_fName" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_lName">Last Name:</label>
                <input type="text" class="form-control" id="personnel-update_lName" placeholder="Last Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_SSN">SSN:</label>
                <input type="text" class="form-control" id="personnel-update_SSN" placeholder="SSN">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_DOD">DOD:</label>
                <input type="text" class="form-control" id="personnel-update_DOD" placeholder="DOD">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_DOB">Date of Birth:</label>
                <input type="text" class="form-control" id="personnel-update_DOB" placeholder="DOB">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_BloodType">Blood Group:</label>
                <input type="text" class="form-control" id="personnel-update_BloodType" placeholder="Blood Group">
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label class="label label-default" for="personnel-update_Address">Address:</label>
            <input type="text" class="form-control" id="personnel-update_Address" placeholder="Address">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <a class="btn btn-success col-md-12">Update</a>
            </div>
            <div class="form-group col-md-4">
                <a href="list.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>