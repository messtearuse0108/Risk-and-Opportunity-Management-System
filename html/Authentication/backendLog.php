<?php

session_start();

$conn = mysqli_connect('localhost','root','');

mysqli_select_db($conn,'risk');

$email = $_POST['email'];
$password = $_POST['password'];

$s = "select * from register where email ='$email' && password = '$password' ";

$result = mysqli_query($conn,$s);
$row = mysqli_fetch_array( $result );
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['fullName'] = $row['fullname'];
    $_SESSION['photo'] = $row['photo'];
    header('location:../dash.php');
}else{
    header('location:../index.php');
}

?>