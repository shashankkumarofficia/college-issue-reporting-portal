<?php

session_start();
unset($_SESSION['fid']);
session_destroy();
echo "<script>window.location.replace('../index.php')</script>";
