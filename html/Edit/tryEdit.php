<?php

session_start();

if(isset($_POST['submit'])){ 
include "../database.php"; 
$year_id = $_POST['year_id'];
$sql = "UPDATE risk_table SET year_id=$year_id";

$encoder =  $_SESSION['fullName'];
$result3 = $conn->query($sql);
$last_id = $conn->insert_id;
if ($result3) {
    $sql3 = "INSERT INTO history (encoder,actDesc,stat,id) VALUES ('$encoder','Risk Management','Updated Year ID','$last_id')";
    echo $sql3;
    $result3 = $conn->query($sql3);  
    echo "<meta http-equiv='refresh' content='0'>";
} else {
  echo "Error updating record: ".mysqli_error($conn);  
}
mysqli_close($conn);
}
?>