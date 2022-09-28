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
?>
<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
    <title>Issues Resolved</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <link rel="stylesheet" type="text/css" href="../css/button.css">
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
                                <h3 class="panel-title">Issue Resolved</h3>
                            </div> 
                        </div>
                    </div>
                    <div class="panel-body table-fixed">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>

                                    <th>issue</th>
                                    <th>date</th>
                                    <th>student name</th>
                                    <th>Usn</th>

                                </tr> 
                            </thead>
                            <tbody>
                                <?php
                                include '../Connection.php';
                                $i = 1;
                                $que = mysqli_query($conn, "select I.*,s.Name as Name,s.Batch as Batch from posts I,student s where s.Sid=I.studentid and done in ('Solved','Solvedp') order by date desc");

                                while ($row = mysqli_fetch_array($que)) {
                                    ?>

                                    <tr>


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
                   
                </div>

            </div></div></div>

</body>
</html>


