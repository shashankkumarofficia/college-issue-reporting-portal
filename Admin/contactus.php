<?php
session_start();
include('../Connection.php');
error_reporting(1);

$user = $_SESSION['uid'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from admin  where A_Email='$user' ");
$row = mysqli_fetch_array($sql);
$Fid = $row["Fid"];
?>
<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>

<?php include '../asset/admin_dash.php'; ?>

    <div class="container">
        <div class="row">
            <br>
            <br>


            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Contact us </h3>
                            </div> 
                        </div>
                    </div>
                    <div class="panel-body table-fixed">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>
                                    <th><em class="fa fa-cog"></em></th>
                                    <th class="hidden-xs"> Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr> 
                            </thead>
                            <tbody>
                                <?php
                                include '../Connection.php';
                                $i = 1;
                                $que = mysqli_query($conn, "select * from contact ");

                                while ($row = mysqli_fetch_array($que)) {
                                    ?>

                                    <tr>
                                        <td align='center'>
                                            <form method="POST" action="">
                                                <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>"/>
                                                <input type="submit" name="delete" id="but" onclick="return confirm('Confirm To Delete')" value="Delete">
                                            </form>

                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['message']; ?></td>

                                    </tr>

                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>

                    </div>

                </div>

            </div></div></div>

</body>
</html>


<?php
if (isset($_POST['delete'])) {
    $id = $_POST['cid'];

    $select2 = "DELETE FROM contact where cid='$id' ";
    $result2 = mysqli_query($conn, $select2);
    echo "<script>alert('deleted')</script>";
    echo "<script>window.location.replace('contactus.php')</script>";
}
 
 


