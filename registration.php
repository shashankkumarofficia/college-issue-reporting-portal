
<?php
include 'Connection.php';

if (isset($_POST['Submit'])) {

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Batch = $_POST['Batch'];
    $Branch = $_POST['Branch'];
    $Password = $_POST['Password'];

    $select = "select *from student where Email= '$Email'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exist')</script>";
        echo "<script>window.location.replace('registration.php')</script>";
    } else {

        $sql = "insert into student (Sid,Name,Email,Phone,Batch,Branch,Password) values('','$Name','$Email','$Phone','$Batch','$Branch','$Password')";
        $r = mysqli_query($conn, $sql);
        echo "<script>alert('Account is Registered please wait for approval')</script>";
        echo "<script>window.location.replace('registration.php')</script>";
    }
}
?>
<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="./images/scroll-64.png" sizes="32x32">
    <title>Student Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <style>
        .con{
            color: white;
        }

    </style>
</head>
<body>
    <?php include './asset/landingpage.php'; ?>
    <div class="con" style="margin-top: 7%;overflow: hidden; " >

        <form class="form-horizontal" method="POST" action="">
            <fieldset>

                <br>
                <!-- Form Name -->

                <br>
                <center>
                    <h3>Student Registration</h3>
                </center>
                <br>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="Name">Name :</label>  
                    <div class="col-md-4">
                        <input id="Name" name="Name" type="text" placeholder="Name" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Email">Email :</label>  
                    <div class="col-md-4">
                        <input id="Email" name="Email" type="text" placeholder="Enter the email" class="form-control input-md" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,4}$" title="xyz@something.com" required="">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Phone">Phone :</label>  
                    <div class="col-md-4">
                        <input id="Phone" name="Phone" type="text" placeholder="Phone" class="form-control input-md" pattern="^\d{10}$" title="10 numeric characters only" required="">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Batch">USN :</label>  
                    <div class="col-md-4">
                        <input id="Batch" name="Batch" type="text" placeholder="Enter Your Usn" class="form-control input-md" pattern="[1-4][A-Z,a-z][A-Z,a-z][0-9][0-9][A-Z,a-z][A-Z,a-z][0-9][0-9][0-9]$" title="usn pattern only"  required="">
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Branch">Select Branch :</label>
                    <div class="col-md-4">
                        <select id="Branch" name="Branch" class="form-control">
                            <?php
                            include 'Connection.php';
                            $branch_query = "SELECT * FROM faculty";
                            $result = mysqli_query($conn, $branch_query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($branch_row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $branch_row['Fid'] ?>">
                                        <?php echo $branch_row['Branch'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Password  :</label>
                    <div class="col-md-4">
                        <input id="passwordinput" name="Password" type="password" placeholder="Password" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Submit"></label>
                    <div class="col-md-8">
                        <button id="Submit" name="Submit" class="btn btn-success">Submit</button>
                        <button id="Reast" name="Reast" class="btn btn-primary">Reset</button>
                    </div>
                </div>
                <br>

            </fieldset>
        </form>
    </div>
</body>
</html>











