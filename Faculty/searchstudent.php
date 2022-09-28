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
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
        <title>Search Students</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/table.css">
        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);

            body{
                background: #f2f2f2;
                font-family: 'Open Sans', sans-serif;
            }

            .search {
                width: 100%;
                position: relative;
                display: flex;
                margin-top: 6%;
            }

            .searchTerm {
                width: 100%;
                border: 3px solid black;
                border-right: none;
                padding: 5px;
                height: 36px;
                border-radius: 5px 0 0 5px;
                outline: none;
                color: #9DBFAF;
            }

            .searchTerm:focus{
                color: black;
            }

            .searchButton {
                width: 40px;
                height: 36px;
                border: 1px solid #00B4CC;
                background: black;
                text-align: center;
                color: #fff;
                border-radius: 0 5px 5px 0;
                cursor: pointer;
                font-size: 20px;
            }

            /*Resize the wrap to see the search bar change!*/
            .wrap{
                width: 50%;
                position: relative;
                top: 15%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            /*.searchbar{
                margin-top: 50%;
                float: left;
                
            }*/
            .panel-table{
                margin-top: 3%;
            }
        </style>
    </head>

    <body>

        <?php include '../asset/faculty_dash.php'; ?>
        <form method="post" action="">
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" name="term" placeholder="Search by Student USn or Name?">
                    <button type="submit" name='submit' class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>

                </div>
            </div>
        </form>


        <div class="container ttable">
            <div class="row">
                <br>
                <br>


                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default panel-table table-fixed">


                        <table class="table table-striped table-bordered table-list ">

                            <tbody>
                                <?php
                                include '../Connection.php';
                                if (isset($_POST['submit'])) {
                                    $term = $_POST['term'];

                                    $i = 1;
                                    // $que=mysqli_query($conn,"SELECT * FROM student WHERE Name LIKE '%".$term."%'");
                                    $que = mysqli_query($conn, "select s.* ,f.Branch from student s,faculty f where s.Branch=f.Fid and Batch LIKE '%" . $term . "%' and s.status='approved' or s.Branch=f.Fid and  Name LIKE '%" . $term . "%' and s.status='approved'");
                                    if ($que) {
                                        if (mysqli_num_rows($que) > 0) {

                                            echo '<thead>
                                            <tr>

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Usn</th>
                                            <th>Branch</th>
                                            </tr>
                                            </thead>';

                                            while ($row = mysqli_fetch_array($que)) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $row['Name']; ?></td>
                                                    <td><?php echo $row['Email']; ?></td>
                                                    <td><?php echo $row['Phone']; ?></td>
                                                    <td><?php echo $row['Batch']; ?></td>
                                                    <td><?php echo $row['Branch']; ?></td>
                                                </tr>

                                                <?php
                                            }
                                        } else {
                                            echo "<h2><center>Data not found</center></h2>";
                                        }
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>

                </div></div></div>

    </body>
</html>

