<?php
session_start();
include('../Connection.php');
error_reporting(1);

$user = $_SESSION['fid'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from faculty where F_email='$user' ");
$users = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
        <title>Change Password</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </head>

    <body>

<?php include '../asset/faculty_dash.php'; ?>
        <div class="display" style="overflow: hidden;">
        <form class="form-horizontal" method="post" action="">
            <fieldset>

                <br>
                <br>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="oldpassword">Old Password :</label>
                    <div class="col-md-4">
                        <input id="oldpassword" name="op" type="password" placeholder="Enter old password" class="form-control input-md" required="">
                    </div>
                </div>
                <br>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="newpassword">New Password:</label>
                    <div class="col-md-4">
                        <input id="newpassword" name="newpassword" type="password" placeholder="Enter new password" class="form-control input-md" required="">
                    </div>
                </div>
                <br>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="confirmpassword">Confirm Password</label>
                    <div class="col-md-4">
                        <input id="confirmpassword" name="confirmpassword" type="password" placeholder="Enter new password again" class="form-control input-md" required="">
                    </div>
                </div>

                <br>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="update"></label>
                    <div class="col-md-4">
                        <button id="update" name="update" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </fieldset>
        </form>

</div>
    </body>
</html>


<?php
if (isset($_POST['update'])) {

    $op = $_POST['op'];

    $select = ("select *from faculty where Password=$op");
    $result = mysqli_query($conn, $select);
    $row = mysqli_num_rows($result);
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST ['confirmpassword'];

    if ($row == true) {
        if ($newpassword == $confirmpassword) {
            $sql = mysqli_query($conn, "update faculty set Password='$newpassword' where F_email='$user'");

            if ($sql == true) {
                echo "<script>alert('password changed')</script>";
                echo "<script>window.location.replace('faculty_password_reset.php')</script>";
            }
        } else {
            echo "<script>alert('password notechanged new pass doesnt match with old one')</script>";
            echo "<script>window.location.replace('faculty_password_reset.php')</script>";
        }
    } else {
        echo "<script>alert('worng old password')</script>";
        echo "<script>window.location.replace('faculty_password_reset.php')</script>";
    }
}



