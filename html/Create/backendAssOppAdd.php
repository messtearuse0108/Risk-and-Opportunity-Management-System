<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,'risk');


if(isset($_POST['insertOpp']))
{
    $o_id = $_POST['o_id'];

    $o_num =  $_POST['o_num'];

    $oppOccur = $_POST['oppOccur'];

    $effective= $_POST[ 'effective' ];

    $remarks = $_POST['remarks'];

    $likelihood = $_POST[ 'likelihood' ];

    $severity = $_POST['severity' ];

    $rpn = $_POST[ 'rpn' ];

    $eval_res = $_POST[ 'eval_res' ];

    $activity = $_POST['activity']; 
     //this is the name of the table that will be created in the database.  It is a string.
    $encoder =  $_SESSION['fullName'];
    

    $sql = "UPDATE oppassessment_table 
    SET  o_num='$o_num', oppOccur='$oppOccur', 
    effective='$effective', remarks='$remarks', 
    likelihood='$likelihood', severity='$severity', 
    rpn='$rpn', eval_res='$eval_res', treatment='$treatment', 
    action_plan='$action_plan',  dateAs='$dataAs', encoder='$encoder'
    WHERE o_id=$o_id"; 
   
    echo $sql;
    //exit();
    $result = $connection->query($sql);
    $last_id = $connection->insert_id;
    if($result)
    {   
        // Update Treatment
        if (!empty($_POST['treatment'])) {
            foreach ($_POST['treatment'] as $index => $treatment) 
            {
                echo $treatment;
                $sqlRisk1 = "INSERT INTO treatment2 (treatment, tIndex ,r_id) VALUES ('$treatment','$index','$o_id')";
                $risk1 = $connection->query($sqlRisk1); 
            }
        }
        if (!empty($_POST['action_plan'])) {
            foreach ($_POST['action_plan'] as $index => $action_plan) 
            {
                echo $action_plan;
                $sqlRisk2 = "INSERT INTO action_plan2 (action_plan, aIndex,r_id) VALUES ('$action_plan','$index ','$o_id')";
                $risk2 = $connection->query($sqlRisk2); 
            }
        }
        if (!empty($_POST['dateAs'])) {
            foreach ($_POST['dateAs'] as $index => $dateAs) 
            {
                echo $dateAs;
                $sqlRisk3= "INSERT INTO dateAss (dateAs, dIndex,r_id) VALUES ('$dateAs','$index ','$o_id')";
                $risk3 = $connection->query($sqlRisk3); 
            }
        }

        $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Opportunity Assessment','Added','$last_id')";
        $result3 = $connection->query($sql3);
        header('Location: ../Forms/assOp.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved");</script>';
        header('Location: ../index.php');
    }
}
?>
