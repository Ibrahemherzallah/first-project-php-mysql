<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userName'];
    $enteredPassword = $_POST['password'];
    $sql = "Select * from usersInfo";
    $rs = mysqli_query($conn,$sql);
    $flag = 0; 
    if(mysqli_num_rows($rs)> 0){
        while($row = mysqli_fetch_assoc($rs)){
            if($row['firstName'] == $username )
            {

                $flag=1;
                if($row['pass'] == $enteredPassword){
                    session_start();
                    $id = $row['id'];
                    $_SESSION['id'] = $id;
                    setcookie('user' ,$id,time()+3600,'/');
                    header("Location: profilePage.php?msg The name is ".$row['firstName'].$row['lastName']);
                }
                else{
                    header("Location: logIn.html?msg Wrong password");
                };
            }
        }
        if($flag == 0){
            header("Location: logIn.html?msg This User Name Does Not Exist");
        }
    }
}
?>