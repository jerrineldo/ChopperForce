<?php 
    function populateDropdown($items, $select = ""){
        $html_dropdown = "";
        foreach ($items as $item) {
            $selected = $select == $item ? "selected" : "";
            $html_dropdown .= "<option $selected value='$item'>$item</option>";
        }

        return $html_dropdown;
    }
    function PopulateDropwdownSoldier($user_ids,$select=""){
        $html_dropdown = "";
        foreach($user_ids as $user_id){
            $selected = $select ==$user_id->user_id ? "selected" : "";
            $html_dropdown.= "<option $selected value = '$user_id->id'>$user_id->first_name $user_id->last_name </option>";
        }
        return $html_dropdown;
    }
?>