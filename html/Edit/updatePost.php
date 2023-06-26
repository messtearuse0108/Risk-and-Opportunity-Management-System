<?php
session_start();
include_once "../database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(isset($_POST['r_id'])){

  $r_id = $_POST['r_id'];  
  
  $year_id =  $_POST['year_id'];

  $risk_num = $_POST['risk_num'];

  $division = $_POST['division'];

  $process=  $_POST['process'];

  $frequency = $_POST['frequency'];

  $risks = $_POST[ 'risks'];

  $impact = $_POST[ 'impact' ];

  $likelihood = $_POST[ 'likelihood' ];

  $severity = $_POST['severity' ];

  $rpn = $_POST[ 'rpn' ];

  $eval_res = $_POST[ 'eval_res' ];

  $treatment= $_POST[ 'treatment' ];

  $action_plan = $_POST[ 'action_plan' ];

  $responsible = $_POST['responsible'];

  $start = $_POST['start'] ;

  $end =$_POST['end'] ;

  $measure = $_POST['measure'];

  $monitoring =$_POST['monitoring' ];

  $dataAs = $_POST['dataAs'];

  $dataRe = $_POST['dataRe'];

  $encoder =  $_SESSION['fullName'];

  $stmt = $conn->prepare("UPDATE risk_table 
          SET year_id=?, risk_num=?, division=?, 
          process=?, frequency=?, risks=?, impact=?, 
          likelihood=?, severity=?, rpn=?, eval_res=?, 
          treatment=?, action_plan=?, responsible=?, 
          start=?, end=?, measure=?, monitoring=?, 
          dataAs=?, dataRe=?, encoder=? WHERE r_id=?");
  $stmt->bind_param("ssssssssssssssssssssss", $year_id, 
          $risk_num, $division, $process, $frequency, 
          $risks, $impact, $likelihood, $severity, $rpn, 
          $eval_res, $treatment, $action_plan, $responsible, 
          $start, $end, $measure, $monitoring, $dataAs, $dataRe, 
          $encoder, $r_id);
  
  if ($stmt->execute()) { 
      echo "Record updated successfully";
      $last_id = $conn->insert_id;
      // TODO: Insert into 'history' table
    $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Management','Updated','$last_id')";
    $result3 = $conn->query($sql3);
      header("location:../Forms/addRisk.php");
    } else {
      echo "Error: " . $stmt->error;
    }
    $stmt->close();
  }
  else {
    echo "Error: 'r_id' key is missing in the form submission.";
  }
}

?>