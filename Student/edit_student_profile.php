<?php
session_start();
include('../Connection.php');
error_reporting(1);

$user = $_SESSION['sid'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from student where Email='$user' ");
$row = mysqli_fetch_array($sql);
$Sid = $row["Sid"];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
        <title>Edit Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    </head>

    <body>

<?php include '../asset/student_dash.php'; ?>
           <div class="display" style="overflow: hidden;">
        <form class="form-horizontal" method="POST" action="">
            <fieldset>

                <br>
                <!-- Form Name -->
                <center>
                    <legend><b>Edit profile</b></legend>
                </center>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Name">Name :</label>  
                    <div class="col-md-4">
                        <input id="Name" name="Name" type="text"  value="<?php echo $row['Name'] ?>" class="form-control input-md" required="">
                    </div>
                </div>
                <br>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Email">Email :</label>  
                    <div class="col-md-4">
                        <input id="Email" name="Email" type="text" value="<?php echo $row['Email'] ?>" class="form-control input-md" readonly>
                        <span class="help-block">Email id cannot be changed</span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Phone">Phone :</label>  
                    <div class="col-md-4">
                        <input id="Phone" name="Phone" type="text" value="<?php echo $row['Phone'] ?>" class="form-control input-md" pattern="^\d{10}$" title="10 numeric characters only" required="">
                    </div>
                </div>
                <br>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Submit"></label>
                    <div class="col-md-8">
                        <button id="Submit" name="Submit" class="btn btn-success">Update</button>
                    </div>
                </div>

            </fieldset>
        </form>
            </div>

    </body>
</html>


<?php
if (isset($_POST['Submit'])) {
    $Fname = $_POST['Name'];
    $Phone = $_POST['Phone'];

    $select = "select *from student where Sid= '$Sid'";
    $result = mysqli_query($conn, $select);

    $sql = "update student set Name='$Fname',Phone='$Phone' where Sid=$Sid";
    $r = mysqli_query($conn, $sql);
    echo "<script>alert('updated sucessfully')</script>";
    echo "<script>window.location.replace('edit_student_profile.php')</script>";
}


