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

<?php include('serverfaculty.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../images/scroll-64.png" sizes="32x32">
        <title>College Issues report</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/studentindex.css">

    </head>

    <body>

<?php include '../asset/faculty_dash.php'; ?>

        <div class="margin">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Public</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Anonymous</button>
            </div>


            <!-- public -->
            <div id="London" class="tabcontent">
                <div class="postp">
<?php foreach ($posts as $post): ?>
                        <div class="wall">
                            <div class="post">
                                <div class="post-header">

                                    <div class="post-header-top">
                                        <a href="#" class="post-author"><?php echo $post['Name']; ?></a>
                                    </div>
                                    <div class="post-header-bottom">
                                        <div class="post-time"> <?php echo $post['date']; ?></div>
                                    </div>
                                </div>
                                <div class="post-content"><?php echo $post['text']; ?></div>
                                <br>

                                <div class="post-interactions">

                                    <div class="post-info">
                                        <!-- if user likes post, style button differently -->
                                        <i <?php if (userLiked($post['id'])): ?>
                                                class="fa fa-thumbs-up like-btn"
                                            <?php else: ?>
                                                class="fa fa-thumbs-o-up like-btn"
    <?php endif ?>
                                            data-id="<?php echo $post['id'] ?>"></i>
                                        <span class="likes"><?php echo getLikes($post['id']); ?></span>

                                        &nbsp;&nbsp;&nbsp;&nbsp;

                                        <!-- if user dislikes post, style button differently -->
                                        <i 
                                            <?php if (userDisliked($post['id'])): ?>
                                                class="fa fa-thumbs-down dislike-btn"
                                            <?php else: ?>
                                                class="fa fa-thumbs-o-down dislike-btn"
    <?php endif ?>
                                            data-id="<?php echo $post['id'] ?>"></i>
                                        <span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
                                    </div>


                                </div>
                            </div>
                            <br>
                        </div>
<?php endforeach ?>

                </div>

            </div>


            <!-- Anonymous -->
            <div id="Paris" class="tabcontent">

                <div class="postp">
                    <div class="postp">
<?php foreach ($posts2 as $post): ?>
                            <div class="wall">
                                <div class="post">
                                    <div class="post-header">

                                        <div class="post-header-top">
                                            <a href="#" class="post-author">Anonymous</a>
                                        </div>
                                        <div class="post-header-bottom">
                                            <div class="post-time"> <?php echo $post['date']; ?></div>
                                        </div>
                                    </div>
                                    <div class="post-content"><?php echo $post['text']; ?></div>
                                    <br>

                                    <div class="post-interactions">

                                        <div class="post-info">
                                            <!-- if user likes post, style button differently -->
                                            <i <?php if (userLiked($post['id'])): ?>
                                                    class="fa fa-thumbs-up like-btn"
                                                <?php else: ?>
                                                    class="fa fa-thumbs-o-up like-btn"
    <?php endif ?>
                                                data-id="<?php echo $post['id'] ?>"></i>
                                            <span class="likes"><?php echo getLikes($post['id']); ?></span>

                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                            <!-- if user dislikes post, style button differently -->
                                            <i 
                                                <?php if (userDisliked($post['id'])): ?>
                                                    class="fa fa-thumbs-down dislike-btn"
                                                <?php else: ?>
                                                    class="fa fa-thumbs-o-down dislike-btn"
    <?php endif ?>
                                                data-id="<?php echo $post['id'] ?>"></i>
                                            <span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
                                        </div>


                                    </div>
                                </div>
                                <br>
                            </div>
<?php endforeach ?>

                    </div>

                </div>
            </div>

        </div>

        <script src="scripts.js"></script>
        <script>
                    function openCity(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }

                    document.getElementById("defaultOpen").click();
        </script>




    </body>
</html>
