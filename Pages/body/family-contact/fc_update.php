
<div class="container frg">
    <h2 class="report-title">Family Contact Update Page</h2>
    <form method="POST" >
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="fc_fName" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="fc_lastName" placeholder="Last Name">
            </div>
        </div>
        <div class="form-group col-md-12">
            <select id="inputState" class="form-control">
                <option selected>Relationship</option>
                <option value="Spouse">Spouse</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Brother">Brother</option>
                <option value="Sister">Sister</option>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="fc_phone" placeholder="Phone">
            </div>
            <div class="form-group col-md-8">
                <input type="email" class="form-control" id="fc_email" placeholder="Email">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="text" class="form-control" id="fc_address" placeholder="Address">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <input type="text" class="form-control" id="fc_city" placeholder="City">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="fc_state" placeholder="State">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <select id="inputState" class="form-control">
                    <option selected>Preference Form</option>
                    <option value="Spouse">Yes</option>
                    <option value="Father">No</option>
                </select>
            </div>
            <div class="form-group col-md-7">
                <input type="text" class="form-control" id="fc_location" placeholder="Physical Location">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <a class="btn btn-success col-md-12">Update</a>
            </div>
            <div class="form-group col-md-4">
                <a href="family_contact.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>