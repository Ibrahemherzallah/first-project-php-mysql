<?php
include("config.php");
  $fName =$_POST['firstName'];
  $lName = $_POST['lastName'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $sql = "INSERT INTO usersInfo (firstName,lastName,email,pass)
  VALUES ('$fName', '$lName', '$email', '$pass')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New account created successfully";
    header("Location: homePage.html?msg='New record created successfully'");    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: homePage.html?msg='Error,account not created'");    
  }
  mysqli_close($conn);
?>

