<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,'risk');

if(isset($_POST['insertRisk']))
{
    $year_id =  $_POST['year_id'];

    $risk_num = $_POST['risk_num'];

    $division = $_POST['division'];

    $process= $_POST[ 'process' ];

    $frequency = $_POST['frequency'];

    $risks = $_POST[ 'risks'];

    $impact = $_POST[ 'impact' ];

    $likelihood = $_POST[ 'likelihood' ];

    $severity = $_POST['severity' ];

    $rpn = $_POST[ 'rpn' ];

    $eval_res = $_POST[ 'eval_res' ];

    $monitoring =$_POST['monitoring' ];

    $encoder =  $_SESSION['fullName'];
    

    $sql = "INSERT INTO risk_table (year_id, risk_num, process, frequency,  risks, 
    impact, likelihood, severity, rpn, eval_res, monitoring, encoder, division) 
    VALUES ('$year_id','$risk_num', '$process','$frequency',  '$risks', '$impact', '$likelihood', 
    '$severity','$rpn',  '$eval_res','$monitoring', '$encoder', '$division')";
    // echo $sql;
    // //exit();
    $result = $connection->query($sql);
    $last_id = $connection->insert_id;
    if(!empty($result))
    {  
        //Internal Factors
        if (!empty($_POST['factor'])) {
            foreach ($_POST['factor'] as $factor_name) 
            {
                echo $factor_name;
                $sql2 = "INSERT INTO factor_name (factor_name, r_id) VALUES ('$factor_name', '$last_id')";
                $result2 = $connection->query($sql2); 
            }
        }
        //External Factors
        if (!empty($_POST['factor1'])) {
            foreach ($_POST['factor1'] as $factor_name) 
            {
                echo $factor_name;
                $sql3 = "INSERT INTO factor_name1 (factor_name1, r_id) VALUES ('$factor_name', '$last_id')";
                $result3 = $connection->query($sql3); 
            }
        }
        //Interested Parties
        if (!empty($_POST['factor2'])) {
            foreach ($_POST['factor2'] as $factor_name) 
            {
                echo $factor_name;
                $sql4 = "INSERT INTO factor_name2 (factor_name2, r_id) VALUES ('$factor_name', '$last_id')";
                $result3 = $connection->query($sql4); 
            }
        }
        if (!empty($_POST['treatment'])) {
            foreach ($_POST['treatment'] as $index => $treatment) 
            {
                echo $treatment;
                $sqlRisk1 = "INSERT INTO treatment (treatment, tIndex ,r_id) VALUES ('$treatment','$index','$last_id')";
                $risk1 = $connection->query($sqlRisk1); 
            }
        }
        if (!empty($_POST['action_plan'])) {
            foreach ($_POST['action_plan'] as $index => $action_plan) 
            {
                echo $action_plan;
                $sqlRisk2 = "INSERT INTO action_plan (action_plan, aIndex,r_id) VALUES ('$action_plan','$index ','$last_id')";
                $risk2 = $connection->query($sqlRisk2); 
            }
        }
        if (!empty($_POST['start'])) {
            foreach ($_POST['start'] as $index => $start) 
            {
                echo $start;
                $sqlRisk3 = "INSERT INTO start_act (start,sIndex ,r_id) VALUES ('$start', '$index','$last_id')";
                $risk3 = $connection->query($sqlRisk3); 
            }
        }
        if (!empty($_POST['end'])) {
            foreach ($_POST['end'] as $index => $end) 
            {
                echo $end;
                $sqlRisk4 = "INSERT INTO end_of (end,eIndex, r_id) VALUES ('$end','$index', '$last_id')";
                $risk4 = $connection->query($sqlRisk4); 
            }
        }
        if (!empty($_POST['responsible'])) {
            foreach ($_POST['responsible'] as $index => $responsible) 
            {
                echo $responsible;
                $sqlRisk5 = "INSERT INTO responsible (responsible, rIndex,r_id) VALUES ('$responsible','$index', '$last_id')";
                $risk5 = $connection->query($sqlRisk5); 
            }
        }
        if (!empty($_POST['measure'])) {
            foreach ($_POST['measure'] as $index => $measure) 
            {   
                echo $measure;
                $sqlRisk6 = "INSERT INTO measure (measure,mIndex, r_id) VALUES ('$measure','$index', '$last_id')";
                $risk6 = $connection->query($sqlRisk6); 
            }
        }
        $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Management','Added','$last_id')";
            echo $sql3;
            $result3 = $connection->query($sql3);  
        $sql6 = "INSERT INTO assessment_table (risk_id) VALUES ('$last_id') ";
        $result6 = $connection->query($sql6);
        echo "Data Saved";
        header('Location: ../Forms/addRisk.php');
        exit();
    }
    else
    {
        echo "Data Not Saved";
        header('Location:../index.php');
    }
}
?>
