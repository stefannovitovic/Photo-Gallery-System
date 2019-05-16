<?php

    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'. DS . 'wamp64' . DS . 'www' . DS .'projekat1');
    defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', 'C:'. DS . 'wamp64' . DS . 'www' . DS . 'projekat1' . DS . 'admin' . DS . 'includes');
    


    require_once("functions.php");
    require_once("new_config.php");
    require_once("database.php");
    require_once("db_object.php");
    require_once("user.php");
    require_once("photo.php");
    require_once("session.php");
    require_once("comment.php");
    require_once("paginate.php");
    
    


?>
<!-- C:\wamp64\www\projekat1 -->
<!-- C:\wamp64\www\projekat1\admin\includes -->