<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "../database.php";
    // Prepare a delete statement
    $sql = "UPDATE assessment_table SET deleted=1 WHERE id = ?";
    $last_id = $_POST["r_id"];
    session_start();
    $encoder = $_SESSION["fullName"];
    $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Assessment','Deleted','$last_id')";
    echo $sql3;
    $result3 = $conn->query($sql3); 
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            //Records to history
            // Records deleted successfully. Redirect to landing page
            header("location: ../Forms/assRisk.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<?php 
include('h.php');
?>

<body>

        <div class="container-fluid" >
            <div class="row-5">
                <div >
                    <h3 class="mt-5 mb-3">Delete Record</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-success" >
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <div style="padding: 200px; width: 1000px;height: 450px;text-align: center">                        <h5>Are you sure you want to delete this risk? <br>The deleted risk will go to archive </h5>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../Forms/assRisk.php" class="btn btn-secondary">No</a>
                            </p>  
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>        
        </div>
</body>
<?php 
include('f.php');
?>