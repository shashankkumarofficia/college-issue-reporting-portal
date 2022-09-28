<?php
session_start();
include('../Connection.php');
error_reporting(1);

$user = $_SESSION['uid'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from admin where A_Email='$user' ");
$users = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
    <title>Approve Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <style>

    </style>
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
                                <h3 class="panel-title">Students </h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-fixed">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>
                                    <th class="hidden-xs"> Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Usn</th>
                                    <th>Branch</th>
                                    <th><em class="fa fa-cog"></em></th>
                                </tr> 
                            </thead>
                            <tbody>
                                <?php
                                include '../Connection.php';
                                $i = 1;
                                $que = mysqli_query($conn, "select s.*,f.Branch from student s,faculty f where status='pending' and s.Branch=f.Fid ");

                                while ($row = mysqli_fetch_array($que)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['Phone']; ?></td>
                                        <td><?php echo $row['Batch']; ?></td>
                                        <td><?php echo $row['Branch']; ?></td>

                                        <td align='center'>
                                            <form method="POST" action="aprovestudent.php">
                                                <input type="hidden" name="Sid" value="<?php echo $row['Sid']; ?>"/>
                                                <input type="submit" name="approve" id="butgreen" onclick="return confirm('confirm approve')" value="aprove">
                                                <input type="submit" name="deny" id="but" onclick="return confirm('confirm deny')" value="deny">


                                                <!--                                          <a class='btn btn-default'  name='approve'><em class='fa fa-pencil'></em></a>
                                                                                <a class='btn btn-danger'><em class='fa fa-trash'></em></a>-->
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-4">Page 1 of 5
                            </div>
                            <div class="col col-xs-8">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div></div></div>

</body>
</html>
<?php
if (isset($_POST['approve'])) {
    $id = $_POST['Sid'];

    $select = "update student set status ='approved' where Sid='$id' ";
    $result = mysqli_query($conn, $select);
    echo "<script>alert('approved')</script>";
    echo "<script>window.location.replace('aprovestudent.php')</script>";
}


if (isset($_POST['deny'])) {
    $id = $_POST['Sid'];

    $select2 = "DELETE FROM student where Sid='$id' ";
    $result2 = mysqli_query($conn, $select2);
    echo "<script>alert('denyed')</script>";
    echo "<script>window.location.replace('aprovestudent.php')</script>";
}




