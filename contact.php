

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="./images/scroll-64.png" sizes="32x32">
        <title>Contact Us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/contact.css">
        <link rel="stylesheet" type="text/css" href="css/login.css" />
        <style>
            .con{
                color: white;
                position: static;
                height: 700px;
                overflow-y: hidden;
            }
            a{
                color: red;
            }

        </style>
    </head>
    <body>

        <?php include './asset/landingpage.php'; ?>

        <div class="con" style="margin-top: -5%;">
            <section class="contact" id="contact">
                <div class="container">
                    <div class="heading text-center">
                        <h2>Contact
                            <span> Us </span></h2>
                        <br>
                        <p></p>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="title">
                                <h1>Contact detail</h1>
                                <div class="info">
                                    <i class="fas fa-mobile-alt"></i>
                                    <br>


                                    <h4 class="d-inline-block">PHONE :
                                        <br>
                                        <span>+918660678945 , +918559874563</span></h4>
                                </div>
                                <br>
                                <!-- Info-2 -->
                                <div class="info">
                                    <i class="far fa-envelope"></i>
                                    <h4 class="d-inline-block">EMAIL :
                                        <br>
                                        <span><a href="mailto:shashankkumarofficial2@gmail.com">shashankkumarofficial2@gmail.com</a></span></h4>
                                    <br>
                                    <!-- Info-3 -->
                                    <div class="info">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <h4 class="d-inline-block">ADDRESS :<br>
                                            <span>Karnataka Mysore.</span></h4>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="col-md-7">

                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Name" name="n" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Phone" name="m"  pattern="^\d{10}$" title="10 numeric characters only" required="">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" placeholder="Email" name="e" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,4}$" title="xyz@something.com" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" id="comment" placeholder="Message" name="msg" required=""></textarea>
                                </div>
                                <button class="btn btn-block" type="submit" name="submit">Send Now!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </body>
</html>

<?php
include 'Connection.php';

if (isset($_POST['submit'])) {
    $count = 0;

    $Name = $_POST['n'];
    $Phone = $_POST['m'];
    $Email = $_POST['e'];
    $Message = $_POST['msg'];
    $sql = "insert into contact(cid,name,phone,email,message) values('$count+1','$Name','$Phone','$Email','$Message')";
    $r = mysqli_query($conn, $sql);
    if ($r == true) {
        echo "<script>alert('sended')</script>";
        echo "<script>window.location.replace('contact.php')</script>";
    } else {
        echo "<script>alert(' not sended')</script>";
        echo "<script>window.location.replace('contact.php')</script>";
    }
}
 
                


       