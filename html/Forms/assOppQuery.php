<?php
     $connection = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($connection,'risk');
     if(isset ($_POST['riskPast']))
     {
        $riskPast = $_POST['riskPast'];
        $assRQ= "SELECT a.o_id,a.opp_num,a.rpn,b.id,b.o_id from opportunity_table a 
        LEFT JOIN oppassessment_table b ON a.o_id = b.o_id WHERE a.o_id='$riskPast'";
        $res = mysqli_query($connection,$assRQ);
        $row = mysqli_fetch_assoc($res);
        //echo $row['r_id']. '<br>'. $row['rpn']. '<br>'. $row['id']. '<br>'. $row['risk_id'];
        echo $row['rpn'];
     }    
?>