
<?php
require 'header.php';
?>
<!--
Form By Journey
    !-->
<body>

    <form action="#" method="post" id="shippingForm" name="form_ship">
        <fieldset>
        
            <fieldset>
                <legend>Personell</legend>
        
                <!-- MOS -->
                <p><label for="personell__MOS">MOS</label>
                <input type="text" id="Personell__MOS" name="Personell__MOS" /></p>
        
                <!--  RANK -->
                <p><label for="personell__rank"> Rank</label>
                <input type="text" id="personell__rank" name="personell__rank" /></p>
        
                <!-- Last Name -->
                <p><label for="in_pc">Last Name</label>
                <input type="text" id="in_pc" name="f_pc" /></p>
                
                <!-- Last Name -->
                <p><label for="personell__LName">Last Name</label>
                <input type="text" id="personell__LName" name="personell__LName" /></p>
                
                <!-- First Name -->
                <p><label for="personell__FName">First Name</label>
                <input type="text" id="personell__FName" name="personell__FName" /></p>
                
                <!-- SSN -->
                <p><label for="personell__SSN">SSN</label>
                <input type="text" id="personell__SSN" name="personell__SSN" /></p>
                
                <!-- DOD ID -->
                <p><label for="personell__DODID">DOD ID</label>
                <input type="text" id="personell__DODID" name="personell__DODID" /></p>
                
                <!-- Date of Birth -->
                <p><label for="personell__DOB">Date of Birth</label>
                <input type="datetime" id="personell__DOB" name="personell__DOB" /></p>
                
                <!-- Blood Type -->
                <p><label for="personell__BloodType">Blood Type</label>
                <input type="text" id="personell__BloodType" name="personell__BloodType" /></p>
                
                <!-- Address -->
                <p><label for="personell__Address">Address</label>
                <input type="text" id="personell__Address" name="personell__Address" /></p>
            </fieldset>
            <fieldset>
                <legend>FRG Roster</legend>
                
                <!-- Spouse/Kin -->
                <p><label for="FRG__Spouce">Spouse/Kin</label>
                <input type="text" id="FRG__Spouce" name="FRG__Spouce" /></p>

                <!-- Phone Number -->
                <p><label for="FRG__Phone">Spouse/kin Phone Number</label>
                <input type="text" id="FRG__Phone" name="FRG__Phone" /></p>

                <!-- Email -->
                <p><label for="FRG__email"> Spouse/Kin Email</label>
                <input type="email" id="FRG__Email" name="FRG__Email" /></p>


                <!-- Adress-->
                <p><label for="FRG__Address">Spouse/kin Mailing Adress</label>
                <input type="text" id="FRG__Address" name="FRG__Address" /></p>
                    
                <!-- Preference Form-->
                <p><label for="FRG__preference">Spouse/kin Preference Form</label>
                <input type="text" id="FRG__preference" name="FRG__preference" /></p>

                <!-- Physical Location if Different-->
                <p><label for="FRG__AdressTwo">Physical Location if Different</label>
                    <input type="text" id="FRG__AdressTwo" name="FRG__AdressTwo" /></p>
            
            </fieldset>
            <fieldset>
                <legend>Crazy Horse Ncoers</legend>
                
                
                <!-- Rater-->
                <p><label for="Ncoers__Rater">Rater</label>
                <input type="text" id="Ncoers__Rater" name="Ncoers__Rater" /></p>

                <!-- Senior Rater-->
                <p><label for="Ncoers__Senior">Senior Rater</label>
                <input type="text" id="Ncoers__Senior" name="Ncoers__Senior" /></p>

                <!-- Reviewer-->
                <p><label for="Ncoers__Reviewer">Reviewer</label>
                <input type="text" id="Ncoers__Reviewer" name="Ncoers__Reviewer" /></p>

                <!-- OER-->
                <p><label for="Ncoers__OER">Last OER</label>
                <input type="text" id="Ncoers__OER" name="Ncoers__OER" /></p>

                <!-- Thru Date-->
                <p><label for="Ncoers__THRU">THRU Date</label>
                <input type="date" id="Ncoers__THRU" name="Ncoers__THRU" /></p>


                <!-- DUE-->
                <p><label for="Ncoers__DUE">DUE</label>
                <input type="date" id="Ncoers__DUE" name="Ncoers__DUE" /> </p>
                
                <!-- Type-->
                <p><label for="Ncoers__Type">Type</label>
                <input type="text" id="Ncoers__Type" name="Ncoers__Type" /> </p>

                <!-- Remarks-->
                <p><label for="Ncoers__Remarks">Remarks</label>
                <input type="text" id="Ncoers__Remarks" name="Ncoers__Remarks" /> </p>

            </fieldset>
            <fieldset>
                <legend>Crazy Horse OERS</legend>
                
                
                <!-- Rater-->
                <p><label for="OERS__Rater">Rater</label>
                <input type="text" id="OERS__Rater" name="OERS__Rater" /></p>

                <!-- Senior Rater-->
                <p><label for="OERS__Senior">Senior Rater</label>
                <input type="text" id="OERS__Senior" name="OERS__Senior" /></p>

                <!-- Reviewer-->
                <p><label for="OERS__Reviewer">Reviewer</label>
                <input type="text" id="OERS__Reviewer" name="OERS__Reviewer" /></p>

                <!-- OER-->
                <p><label for="OERS__OER">Last OER</label>
                <input type="text" id="OERS__OER" name="OERS__OER" /></p>

                <!-- Thru Date-->
                <p><label for="OERS__THRU">THRU Date</label>
                <input type="date" id="OERS__THRU" name="OERS__THRU" /></p>


                <!-- DUE-->
                <p><label for="OERS__DUE">DUE</label>
                <input type="date" id="OERS__DUE" name="OERS__DUE" /> </p>
                
                <!-- Type-->
                <p><label for="OERS__Type">Type</label>
                <input type="text" id="OERS__Type" name="OERS__Type" /> </p>

                <!-- Remarks-->
                <p><label for="Ncoers__Remarks">Remarks</label>
                <input type="text" id="OERS__Remarks" name="OERS__Remarks" /> </p>

            </fieldset>
            <fieldset>
                <legend>Awards</legend>
                
                <!-- Recomender-->
                <p><label for="Award__Recomender">Recommender</label>
                <input type="text" id="Award__Recomender" name="Award__Recomender" /> </p>
                <!-- Award-->
                <p><label for="Award__Award">Award</label>
                <input type="text" id="Award__Award" name="Award__Award" /> </p>
                <!-- Reason-->
                <p><label for="Award__Reason">Reason</label>
                <input type="text" id="Award__Reason" name="Award__Reason" /> </p>
                <!-- Present-->
                <p><label for="Award__Present">Present</label>
                <input type="text" id="Award__Present" name="Award__Present" /> </p>
                <!-- Days-->
                <p><label for="Award__Days">Days</label>
                <input type="number" id="Award__Days" name="Award__Days" /> </p>
                <!-- Remarks -->
                <p><label for="Award__Remarks">Remarks</label>
                <input type="text" id="Award__Remarks" name="Award__Remarks" /> </p>

            
            </fieldset>
            <fieldset>
                <legend>Weapons </legend>
                <!-- Weapon S-->
                <p><label for="Weapon__weapons">Weapon S</label>
                <input type="text" id="Weapon__weapons" name="Weapon__weapons" /> </p>
                <!-- Date -->
                <p><label for="Weapon__Date"> Date </label>
                 <input type="date" id="Weapon__Date" name="Weapon__Date" /> </p>
                 <!-- Next -->
                <p><label for="Weapon__Next">Next</label>
                <input type="date" id="Weapon__Next" name="Weapon__Next" /> </p>
                 <!-- Hit -->
                <p><label for="Weapon__Date">Hit</label>
                <input type="number" id="Weapon__Date" name="Weapon__Date" /> </p>
                 <!-- Qualification -->
                 <p><label for="Weapon__Qualification">Qualification</label>
                <input type="text" id="Weapon__Qualification" name="Weapon__Qualification" /> </p>    
            
            </fieldset>
            <button type ="submit">Add new soldier</button>
        </form>
        
</body>
<?php
require 'footer.php';
?>
<!-- User Upload Page(Documents, Awards, qualifications)(Journey Gault)
C.User can create new records
R.User can read previous records
U.User can update records
D.Admin can delete records. -->
