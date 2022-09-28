<?php
error_reporting(1);
include'../Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
        <title>Add Faculty</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include '../asset/admin_dash.php'; ?>
        <div class="display" style="overflow: hidden;">
    <center>
        <form class="form-horizontal" action="" method="POST">
            <fieldset>

                <!-- Form Name -->
                <center>
                    <legend><b>Add Faculty</b></legend>
                </center>

                <br>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Fname">Faculty Name :</label>  
                    <div class="col-md-4">
                        <input id="Fname" name="Fname" type="text" placeholder="Enter name" class="form-control input-md" required="">
                    </div>
                </div>
                <br>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Branch">Branch :</label>  
                    <div class="col-md-4">
                        <input id="Branch" name="Branch" type="text" placeholder="Enter the branch" class="form-control input-md" required="">
                    </div>
                </div>
                <br>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label" for="F_email">Faculty Email :</label>  
                    <div class="col-md-4">
                        <input id="F_email" name="F_email" type="text" placeholder="Enter Email" class="form-control input-md" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,4}$" title="xyz@something.com" required="">  
                    </div>
                </div>
                <br>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Password">Password :</label>
                    <div class="col-md-4">
                        <input id="Password" name="Password" type="password" placeholder="Enter Password" class="form-control input-md" required="">
                    </div>
                </div>

                <br>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Submit"></label>
                    <div class="col-md-4">
                        <button id="Submit" name="Submit" class="btn btn-primary">Submit</button>
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
    $Branch = $_POST['Branch'];
    $F_email = $_POST['F_email'];
    $Password = $_POST['Password'];

    $select = "select *from faculty where F_email= '$F_email'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exist')</script>";
        echo "<script>window.location.replace('add_faculty.php')</script>";
    }

    $sql = "insert into faculty (Fid,Fname,Branch,F_email,Password) values('','$Fname','$Branch','$F_email','$Password')";
    $r = mysqli_query($conn, $sql);

    if ($r == 0) {
        echo "<script>alert('Account is not Registered')</script>";
        echo "<script>window.location.replace('add_faculty.php')</script>";
    } else {
        echo "<script>alert('Account is Registered')</script>";
        echo "<script>window.location.replace('add_faculty.php')</script>";
    }
}

// Close connection
mysqli_close($conn);

