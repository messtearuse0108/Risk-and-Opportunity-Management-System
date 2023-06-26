<?php
session_start();

if(isset($_POST["submit"])){

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con,'risk');
    $fullName= $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $s = "select * from register where email = '$email' ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);
    if($num == 1 ){  
        $em =  'Username Already Taken';
        $_SESSION['emailVal'] = $em;
        header('location:reg.php?error= Username Already Taken') ;
    }
    else{
        // Insert data with File
    $status = $statusMsg = ''; 
    $status = 'error'; 
  if  (!empty($_FILES["photo"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["photo"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['photo']['tmp_name']; 
            $photo = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $reg= " insert into register (fullName, username,email,password,photo) values ('$fullName','$username','$email','$password','$photo')";
            mysqli_query($con,$reg);
            if($reg){ 
                $status = 'success';
                $statusMsg = "File uploaded successfully."; 
                header("Location: ../index.php");  
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 

 
// Display status message 
        echo $statusMsg; 
        // Insert data with File
      
    }
}

?>