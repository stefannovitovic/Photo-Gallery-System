<?php

include ("session.php");
include ("functions.php");

$session->logout();
redirect_user("../index");


?>