<?php 
    function populateDropdown($items, $select = ""){
        $html_dropdown = "";
        foreach ($items as $item) {
            $selected = $select == $item ? "selected" : "";
            $html_dropdown .= "<option $selected value='$item'>$item</option>";
        }

        return $html_dropdown;
    }
?>