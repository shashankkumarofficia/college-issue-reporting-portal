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
<head>
    <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
    <title>All Students</title>
    <link rel="stylesheet" href="../css/faculties.css">
     <link rel="stylesheet" type="text/css" href="../css/table.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

</head>
<body>
<?php include '../asset/faculty_dash.php'; ?>

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
                                </tr> 
                            </thead>
                            <tbody>
                                <?php
                                include '../Connection.php';
                                $i = 1;
                                $que = mysqli_query($conn, "select s.*,f.Branch from student s,faculty f where s.Branch=f.Fid and status='approved'");

                                while ($row = mysqli_fetch_array($que)) {

                                    echo "<tr>";
                                    echo "<td>" . $row['Name'] . "</td>";
                                    echo "<td>" . $row['Email'] . "</td>";
                                    echo "<td>" . $row['Phone'] . "</td>";
                                    echo "<td>" . $row['Batch'] . "</td>";
                                    echo "<td>" . $row['Branch'] . "</td>";
                                    echo"</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    
                </div>

            </div></div></div>

</body>
</html>

