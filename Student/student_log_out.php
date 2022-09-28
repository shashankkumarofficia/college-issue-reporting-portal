<?php

session_start();
unset($_SESSION['sid']);
session_destroy();
echo "<script>window.location.replace('../index.php')</script>";


