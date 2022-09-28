
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
?>

<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
    <title>Post issue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <?php include '../asset/student_dash.php'; ?>
    <br>

    <form class="form-horizontal" action="post.php" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Post Your Issue</legend>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="issue">Post :</label>
                <div class="col-md-4">                     
                    <textarea class="form-control" id="issue" rows="10" name="issue" placeholder="type your issue here" required=""></textarea>
                </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="postoption">Post as :</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label for="postoption-0">
                            <input type="radio" name="postoption" id="postoption-0" value="Public" checked="checked">
                            Public
                        </label>
                    </div>
                    <div class="radio">
                        <label for="postoption-1">
                            <input type="radio" name="postoption" id="postoption-1" value="Anonymous">
                            Anonymous
                        </label>
                    </div>
                    <div class="radio">
                        <label for="postoption-2">
                            <input type="radio" name="postoption" id="postoption-2" value="ToAdmin">
                            To Admin
                        </label>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" onclick="return confirm('Be sure once u posted there will no delete option according to privacy policy')" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </fieldset>
    </form>

</body>
</html>

