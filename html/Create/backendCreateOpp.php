<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,'risk');


if(isset($_POST['insertOpp']))
{
    $year_id =  $_POST['year_id'];

    $opp_num = $_POST['opp_num'];

    $process= $_POST[ 'process' ];

    $frequency = $_POST['frequency'];

    $factor = $_POST[ 'factor' ];

    $opp = $_POST[ 'opp'];

    $impact = $_POST[ 'impact' ];

    $likelihood = $_POST[ 'likelihood' ];

    $benefit=$_POST['benefit' ];

    $rpn = $_POST[ 'rpn' ];

    $eval_res = $_POST[ 'eval_res' ];

    $treatment= $_POST[ 'treatment' ];

    $action_plan = $_POST[ 'action_plan' ];

    $responsible = $_POST['responsible'];

    $start = $_POST['start'];

    $end = $_POST['end'];

    $measure = $_POST['measure'];

    $monitoring =$_POST['monitoring' ];

    $encoder =  $_SESSION['fullName'];

    $division = $_POST['division'];
 
    $sql = "INSERT INTO opportunity_table (year_id, opp_num, process, frequency, opp, 
    impact, likelihood, benefit, rpn, eval_res, treatment, action_plan, responsible, 
    start, end, measure, monitoring, encoder,division) 
    VALUES ('$year_id','$opp_num', '$process','$frequency',  '$opp', 
    '$impact', '$likelihood', '$benefit','$rpn',  '$eval_res', 
    '$treatment', '$action_plan','$responsible', '$start', '$end', '$measure', '$monitoring', 
    '$encoder','$division')";
    echo $sql;
    //exit();
    $result = $connection->query($sql);
    $last_id = $connection->insert_id;

    if($result)
    {
        foreach ($_POST['factor'] as $factor_name) 
            {       
                $sql2 = "INSERT INTO factor_name (factor_name, r_id) VALUES ('$factor_name', '$last_id')";
                $result2 = $connection->query($sql2);  
            }   
        $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Opportunity Management','Added','$last_id')";
        $result3 = $connection->query($sql3);
         //External Factors
         foreach ($_POST['factor1'] as $factor_name) 
         {
             echo $factor_name;
             $sql3 = "INSERT INTO factor_name1 (factor_name1, r_id) VALUES ('$factor_name', '$last_id')";
                 $result3 = $connection->query($sql3); 
         }
         //Interested Parties
         foreach ($_POST['factor2'] as $factor_name) 
         {
             echo $factor_name;
             $sql4 = "INSERT INTO factor_name2 (factor_name2, r_id) VALUES ('$factor_name', '$last_id')";
                 $result3 = $connection->query($sql4); 
         }
        //Query for Array Values
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
         $sql6 = "INSERT INTO oppassessment_table (o_id) VALUES ('$last_id') ";
         $result6 = $connection->query($sql6);
        echo '<script> alert("Data Saved");</script>';
        header('Location: ../Forms/addOp.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved");</script>';
        header('Location: ../index.php');
    }
}
?>
