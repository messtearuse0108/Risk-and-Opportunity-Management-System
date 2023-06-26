
<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  
    require_once "../database.php";
    // Prepare a select statement
    $sql = " SELECT * FROM assessment_table WHERE id = ? ";
    
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
                $r_num = $row["r_num"];
                $riskOccur = $row["riskOccur"];
                $effective = $row["effective"];
                $remarks = $row["remarks"];
                $likelihood = $row["likelihood"];
                $severity = $row["severity"];
                $rpn = $row["rpn"];
                $eval_res = $row["eval_res"];
                $treatment = $row["treatment"];
                $action_plan = $row["action_plan"];
                $dateAs = $row["dateAs"];
                $encoder = $_SESSION["fullName"];
                    $last_id = $conn->insert_id;;
                    $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Assessment','Viewed','$last_id')";
                    $result3 = $conn->query($sql3);
            } else{
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
