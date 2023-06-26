<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,'risk');


if(isset($_POST['insertAss']))
{
   
    $r_id=$_POST['risk_id'];

    $r_num =  $_POST['r_num'];

    $riskOccur = $_POST['riskOccur'];

    $effective= $_POST[ 'effective' ];

    $remarks = $_POST['remarks'];

    $likelihood = $_POST[ 'likelihood' ];

    $severity = $_POST['severity' ];

    $rpn = $_POST[ 'rpn' ];

    $eval_res = $_POST[ 'eval_res' ];

    $encoder =  $_SESSION['fullName'];
 
    $sql = "UPDATE assessment_table SET r_num='$r_num', riskOccur='$riskOccur',
    effective = '$effective',remarks='$remarks',likelihood='$likelihood',severity='$severity',
    rpn='$rpn',eval_res='$eval_res',encoder='$encoder' WHERE risk_id=$r_id";
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
                $sqlRisk1 = "INSERT INTO treatment2 (treatment, tIndex ,r_id) VALUES ('$treatment','$index','$r_id')";
                $risk1 = $connection->query($sqlRisk1); 
            }
        }
        if (!empty($_POST['action_plan'])) {
            foreach ($_POST['action_plan'] as $index => $action_plan) 
            {
                echo $action_plan;
                $sqlRisk2 = "INSERT INTO action_plan2 (action_plan, aIndex,r_id) VALUES ('$action_plan','$index ','$r_id')";
                $risk2 = $connection->query($sqlRisk2); 
            }
        }
        if (!empty($_POST['dateAs'])) {
            foreach ($_POST['dateAs'] as $index => $dateAs) 
            {
                echo $dateAs;
                $sqlRisk3= "INSERT INTO dateAss (dateAs, dIndex,r_id) VALUES ('$dateAs','$index ','$r_id')";
                $risk3 = $connection->query($sqlRisk3); 
            }
        }
        $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Assessment','Added','$r_id')";
        $result3 = $connection->query($sql3);
        header('Location: ../Forms/assRisk.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved");</script>';
        header('Location: ../index.php');
    }
}
?>
