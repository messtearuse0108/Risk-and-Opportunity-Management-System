<?php 
    include_once("../database.php");
    if(isset($_POST['div_program']) && $_POST['div_program'] == "YES"){
        $get_id = $_POST['div_desc'];
        $stm = $conn->query("SELECT * FROM div_program WHERE div_cat_desc = '$get_id' ");
        $output="";
        $output.='
                <option value= "" >Select</option>';
        while($row = $stm->fetch_assoc()) {
            $output .="<option value = '$row[div_program_desc]'>$row[div_program_desc]</option>"; 
        }
        echo $output;
    }

    
?>