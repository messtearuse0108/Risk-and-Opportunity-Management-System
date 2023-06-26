<?php
// Include config file
require_once "../database.php";
 
// Define variables and initialize with empty values
$risks = $process = $frequency = "";
$risks_err = $process_err = $frequency_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate risks
    $input_risks = trim($_POST["risks"]);
    if(empty($input_risks)){
        $risks_err = "Please enter a risks.";
    } elseif(!filter_var($input_risks, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $risks_err = "Please enter a valid risks.";
    } else{
        $risks = $input_risks;
    }
    
    // Validate process process
    $input_process = trim($_POST["process"]);
    if(empty($input_process)){
        $process_err = "Please enter an process.";     
    } else{
        $process = $input_process;
    }
    
    // Validate frequency
    $input_frequency = trim($_POST["frequency"]);
    if(empty($input_frequency)){
        $frequency_err = "Please enter the frequency amount.";     
    } elseif(!ctype_digit($input_frequency)){
        $frequency_err = "Please enter a positive integer value.";
    } else{
        $frequency = $input_frequency;
    }
    
    // Check input errors before inserting in database
    if(empty($risks_err) && empty($process_err) && empty($frequency_err)){
        // Prepare an update statement
        $sql = "UPDATE risk_table SET risks=?, process=?, frequency=? WHERE r_id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_risks, $param_process, $param_frequency, $param_id);
            
            // Set parameters
            $param_risks = $risks;
            $param_process = $process;
            $param_frequency = $frequency;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../Forms/addRisk.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM risk_table WHERE r_id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $risks = $row["risks"];
                    $process = $row["process"];
                    $frequency = $row["frequency"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(baserisks($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>risks</label>
                            <input type="text" name="risks" class="form-control <?php echo (!empty($risks_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $risks; ?>">
                            <span class="invalid-feedback"><?php echo $risks_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>process</label>
                            <textarea name="process" class="form-control <?php echo (!empty($process_err)) ? 'is-invalid' : ''; ?>"><?php echo $process; ?></textarea>
                            <span class="invalid-feedback"><?php echo $process_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>frequency</label>
                            <input type="text" name="frequency" class="form-control <?php echo (!empty($frequency_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $frequency; ?>">
                            <span class="invalid-feedback"><?php echo $frequency_err;?></span>
                        </div>
                        <input type="hidden" risks="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
