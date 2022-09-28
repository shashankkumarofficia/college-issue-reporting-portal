<?php
session_start();
include('../Connection.php');
error_reporting(1);

$user = $_SESSION['fid'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from faculty where F_email='$user' ");
$row = mysqli_fetch_array($sql);
//print_r($row);
$Fid = $row["Fid"];
?>

<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
    <title>Your Branch Students</title>
    <link rel="stylesheet" href="../css/faculties.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


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
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list" id="sticky">
                            <thead>
                                <tr>
                                    <th><em class="fa fa-cog"></em></th>
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
                                $que = mysqli_query($conn, "select s.*,f.Branch from student s,faculty f  where s.Branch=f.Fid and s.Branch='$Fid'  and status='approved'");
                                //   $que=mysqli_query($conn,"select s.*,f.Branch AS Branch from student s ,faculty f where status='approved' and s.Branch='$Fid'");

                                while ($row = mysqli_fetch_array($que)) {
                                    ?>
                                    <tr>
                                        <td align='center'>
                                            <form method="POST" action="your_branch.php">
                                                <input type="hidden" name="Sid" value="<?php echo $row['Sid']; ?>"/>

                                                <input type="submit" name="deny" id="but" onclick="return confirm('confirm to delete')" value="delete">


                                                <!--                                          <a class='btn btn-default'  name='approve'><em class='fa fa-pencil'></em></a>
                                                                                <a class='btn btn-danger'><em class='fa fa-trash'></em></a>-->
                                            </form>
                                        </td>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['Phone']; ?></td>
                                        <td><?php echo $row['Batch']; ?></td>
                                        <td><?php echo $row['Branch']; ?></td>


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
if (isset($_POST['deny'])) {
    $id = $_POST['Sid'];

    $select2 = "DELETE FROM student where Sid='$id' ";
    $result2 = mysqli_query($conn, $select2);
    echo "<script>alert('deleted student')</script>";
    echo "<script>window.location.replace('your_branch.php')</script>";
}
