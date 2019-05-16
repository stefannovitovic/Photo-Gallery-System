<?php
    include("includes/header.php"); 


    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $result = new User;
        $result = User::find_by_id($id);
        if ($result->delete())
        {
            $path = "users.php";
            redirect_user($path);
        }
    }


?>