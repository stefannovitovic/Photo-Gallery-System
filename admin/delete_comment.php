<?php
    include("includes/init.php");

    if(isset($_GET['delete_id'])){

        $id = $_GET['delete_id'];
        $result = Comment::find_by_id($id);
        if ($result->delete())
        {
            redirect_user("comments.php");
        }
    }


?>