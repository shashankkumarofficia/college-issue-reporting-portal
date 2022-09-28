<?php
if(isset($_POST['login']))
{
    $F_email=$_POST['F_email'];
    $Password=$_POST['Password'];
    
    $query="select * from faculty where F_email='$F_email' and Password='$Password'";
    include 'Connection.php';
    
    $result=mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1)
    {
       session_start();
       $_SESSION['fid']=$F_email;
       header('location:Faculty');
        
        echo "<script>alert('Login successfull...')</script>";
        echo "<script>window.location.replace('Faculty')</script>";
    }
    else{
        echo "<script>alert('Wrong Email or Password Try Again..')</script>";
         echo "<script>window.location.replace('faculty_login.php')</script>";
    }
    
}
else{
    echo "<script>window.location.replace('faculty_login.php')</script>";
}
