<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();


header('location: index.php');
header('location: index_user.php');
    