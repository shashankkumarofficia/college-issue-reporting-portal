<?php

session_start();
include('../Connection.php');
error_reporting(1);

$user = $_SESSION['sid'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from student where Email='$user'");
$row = mysqli_fetch_array($sql);
//print_r($row);
$Sid = $row["Sid"];

if (isset($_POST['submit'])) {

    $issue = $_POST['issue'];
    $postoption = $_POST['postoption'];

    $sql = "insert into posts (id,text,date,studentid,postoption) values('','$issue',now(),'$Sid','$postoption')";
    $r = mysqli_query($conn, $sql);
    if (r == 0) {
        echo "<script>alert('posted')</script>";
        echo "<script>window.location.replace('post_issue.php')</script>";
    } else {
        echo "<script>alert(' not posted')</script>";
        echo "<script>window.location.replace('post_issue.php')</script>";
    }
}