<?php
session_start();
//destroy session
session_destroy();
//unset cookies
setcookie('user_login', '', 0, "/");

header("Location: 1_Get_Start.html");
?>