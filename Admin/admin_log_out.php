<?php

session_start();
unset($_SESSION['uid']);
session_destroy();
echo "<script>window.location.replace('../index.php')</script>";

