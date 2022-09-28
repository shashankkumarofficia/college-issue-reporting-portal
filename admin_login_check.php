<?php

if(isset($_POST['login']))
{
    $A_Email=$_POST['A_Email'];
    $Password=$_POST['Password'];
    
    $query="select * from admin where A_Email='$A_Email' and Password='$Password'";
    include 'Connection.php';
    
    $result=mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1)
    {
       session_start();
       $_SESSION['uid']=$A_Email;
       header('location:Admin');
        
        echo "<script>alert('Login successfull...')</script>";
        echo "<script>window.location.replace('Admin')</script>";
    }
    else{
        echo "<script>alert('Wrong Email or Password Try Again..')</script>";
         echo "<script>window.location.replace('admin_login.php')</script>";
    }
    
}
else{
    echo "<script>window.location.replace('admin_login.php')</script>";
}
