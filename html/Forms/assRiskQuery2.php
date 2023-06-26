<?php
     $connection = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($connection,'risk');
     if(isset ($_POST['selectId2']))
     {
        $selectId2 = $_POST['selectId2'];

        $assRQ= "SELECT a.r_id,a.risk_num,a.rpn,b.id,b.risk_id from risk_table a 
        LEFT JOIN assessment_table b ON a.r_id = b.risk_id WHERE a.r_id='$selectId2'";
        $res = mysqli_query($connection,$assRQ);
        $row = mysqli_fetch_assoc($res);
        //echo $row['r_id']. '<br>'. $row['rpn']. '<br>'. $row['id']. '<br>'. $row['risk_id'];
        echo $row['risk_num'];
     }    
?>