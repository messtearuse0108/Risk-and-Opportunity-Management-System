<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  // Prepare a select statement
  $sql = " SELECT * FROM risk_table WHERE r_id = ? ";
  if($stmt = mysqli_prepare($conn, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_id);
      // Set parameters
      $param_id = trim($_GET["id"]);
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          $result = mysqli_stmt_get_result($stmt);
          if(mysqli_num_rows($result) == 1){
              /* Fetch result row as an associative array. Since the result set
              contains only one row, we don't need to use while loop */
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
              // Retrieve individual field value
              $year_id = $row["year_id"];
              $risk_num = $row["risk_num"];
              $process = $row["process"];
              $frequency = $row["frequency"];
              $risks = $row["risks"];
              $impact = $row["impact"];
              $likelihood = $row["likelihood"];
              $severity = $row["severity"];
              $rpn = $row["rpn"];
              $eval_res = $row["eval_res"];
              $treatment = $row["treatment"];
              $action_plan = $row["action_plan"];
              $responsible = $row["responsible"];
              $start = $row["start"];
              $end = $row["end"];
              $measure = $row["measure"];
              $monitoring = $row["monitoring"];
              $dataAs = $row["dataAs"];
              $dataRe = $row["dataRe"];
              $encoder = $_SESSION["fullName"];
              $division = $row['division'];
              $dateEncoded = $row['dateEncoded'];
              $r_id = $row['r_id'];
                  $sql2 = "SELECT a.r_id, b.factor_name, b.r_id FROM risk_table a LEFT JOIN factor_name b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                  $result2 = mysqli_query($conn,$sql2);
                  $last_id = $conn->insert_id;;
                  $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Management','Viewed','$last_id')";
                  $result3 = $conn->query($sql3);           
        }else{
          // URL doesn't contain valid id parameter. Redirect to error page
          header("location: error.php");
          exit();
      } 
      } 
    }
  } 
  ?>