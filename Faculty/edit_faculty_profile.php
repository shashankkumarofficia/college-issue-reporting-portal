<?php
session_start();
include('../Connection.php');
error_reporting(1);

$user = $_SESSION['fid'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from faculty where F_email='$user' ");
$row = mysqli_fetch_array($sql);
$Fid = $row["Fid"];
?>
<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
    <title>Edit Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

</head>
<body>
    <?php include '../asset/faculty_dash.php'; ?>

<div class="display" style="overflow: hidden;">

    <form class="form-horizontal" action="" method="POST">
        <fieldset>

            <!-- Form Name -->
            <center>
                <legend><b>Edit your Profile</b></legend>
            </center>


            <br>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Fname">Faculty Name :</label>  
                <div class="col-md-4">
                    <input id="Fname" name="Fname" type="text" value="<?php echo $row['Fname'] ?>" class="form-control input-md" required="">
                </div>
            </div>
            <br>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" for="F_email">Faculty Email :</label>  
                <div class="col-md-4">
                    <input id="F_email" name="F_email" type="text" value="<?php echo $row['F_email'] ?>" placeholder="Enter Email"  class="form-control input-md" readonly> 
                    <span class="help-block">Email id cannot be changed</span>
                </div>
            </div>
            <br>

            <br>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Submit"></label>
                <div class="col-md-4">
                    <button id="Submit" name="Submit" class="btn btn-primary">Update</button>
                </div>
            </div>



        </fieldset>
    </form>

</div>
</body>
</html>

<?php
if (isset($_POST['Submit'])) {
    $Fname = $_POST['Fname'];
    $F_email = $_POST['F_email'];

    $select = "select *from faculty where F_email= '$F_email'";
    $result = mysqli_query($conn, $select);

    $sql = "update faculty set Fname='$Fname',F_email='$F_email' where Fid=$Fid";
    $r = mysqli_query($conn, $sql);
    echo "<script>alert('updated sucessfully')</script>";
    echo "<script>window.location.replace('edit_faculty_profile.php')</script>";
}


