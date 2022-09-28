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
    <title>All issues</title>
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
                                <h3 class="panel-title">All issues</h3>
                            </div> 
                        </div>
                    </div>
                    <div class="panel-body table-fixed">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>
                                    <th><em class="fa fa-cog"></em></th>
                                    <th class="hidden-xs">issue</th>
                                    <th>date</th>
                                    <th>student name</th>
                                    <th>Usn</th>

                                </tr> 
                            </thead>
                            <tbody>
                                <?php
                                include '../Connection.php';
                                $i = 1;
                                $que = mysqli_query($conn, "select I.*,s.Name as Name,s.Batch as Batch from posts I,student s where s.Sid=I.studentid  and postoption in ('Public','Anonymous') and I.done='notdone' order by date desc");

                                while ($row = mysqli_fetch_array($que)) {
                                    ?>

                                    <tr>
                                        <td align='center'>
                                            <form method="POST" action="all_issues.php">
                                                <input type="hidden" name="issueid" value="<?php echo $row['id']; ?>"/>
                                                <input type="submit" name="delete" id="but" onclick="return confirm('confirm to delete')" value="Delete"><br><br>
                                                <input type="submit" name="done" id="butgreen"  value="Solved">
                                            </form>

                                        <td><?php echo $row['text']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['Batch']; ?></td>


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
if (isset($_POST['delete'])) {
    $id = $_POST['issueid'];

    $select2 = "DELETE FROM posts where id='$id' ";
    $result2 = mysqli_query($conn, $select2);
    echo "<script>alert('deleted')</script>";
    echo "<script>window.location.replace('all_issues.php')</script>";
}

if (isset($_POST['done'])) {
    $id = $_POST['issueid'];
    $sql = "update posts set done='Solved' where id=$id";
    $r = mysqli_query($conn, $sql);
    echo "<script>alert('Solved')</script>";
    echo "<script>window.location.replace('all_issues.php')</script>";
}
