<?php

// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "../database.php";
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
            $last_id = $conn->insert_id;
    
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
                $r_id = $row['r_id'];
                    //Fetching Internal Factors
                    $sql2 = "SELECT a.r_id, b.factor_name, b.r_id FROM risk_table a LEFT JOIN factor_name b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                    $result2 = mysqli_query($conn,$sql2);
                    //Fetching External Factors
                    $sql5 = "SELECT a.r_id, b.factor_name1, b.r_id FROM risk_table a LEFT JOIN factor_name1 b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                    $result5 = mysqli_query($conn,$sql5);
                    //Fetching Interested Parties
                    $sql4 = "SELECT a.r_id, b.factor_name2, b.r_id FROM risk_table a LEFT JOIN factor_name2 b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                    $result4 = mysqli_query($conn,$sql4);
                    //Fetching Treatment Values
                    $sqlRisk1 = "SELECT a.r_id, b.tIndex, b.r_id, b.treatment FROM risk_table a LEFT JOIN treatment b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                    $resultA = mysqli_query($conn,$sqlRisk1);
                    //Fetching Action Plan Values
                    $sqlRisk2 = "SELECT a.r_id, b.aIndex, b.r_id, b.action_plan FROM risk_table a LEFT JOIN action_plan b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                    $resultB = mysqli_query($conn,$sqlRisk2);
                     //Fetching Start Values
                     $sqlRisk3 = "SELECT a.r_id, b.sIndex, b.r_id, b.start FROM risk_table a LEFT JOIN start_act b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                     $resultC = mysqli_query($conn,$sqlRisk3);
                     //Fetching End Values
                    $sqlRisk4 = "SELECT a.r_id, b.eIndex, b.r_id, b.end FROM risk_table a LEFT JOIN end_of b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                    $resultD = mysqli_query($conn,$sqlRisk4);
                    //Fetching Responsible Values
                    $sqlRisk5 = "SELECT a.r_id, b.rIndex, b.r_id, b.responsible FROM risk_table a LEFT JOIN responsible b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";
                    $resultF = mysqli_query($conn,$sqlRisk5);
                    //Fetching Measure Values                                                                                                                                                             
                    $sqlRisk6 = "SELECT a.r_id, b.mIndex, b.r_id, b.measure FROM risk_table a LEFT JOIN measure b ON a.r_id = b.r_id WHERE b.r_id = '$r_id'";                                                                                                                                                                                                                                                                                                                                                                                                                                          
                    $resultE = mysqli_query($conn,$sqlRisk6);
                    //Fetching History Data Tables
                    $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Management','Viewed','$last_id')";
                    $result3 = $conn->query($sql3);           
            } 
            else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            } 
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($conn);
} else{
    echo "URL doesn't contain id parameter. Redirect to error page";
    header("location: index.php");
    exit();
}
?>
