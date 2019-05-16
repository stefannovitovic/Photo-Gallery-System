<?php

    class Comment extends Db_object{
        
        protected static $db_table = "comments";

        protected static $db_table_fields = array('photo_id_fk', 'author', 'body', 'time');
        public $id;
        public $photo_id_fk;
        public $author;
        public $body;
        public $time;

        public static function create_comment($photo_id, $author="anonymous", $body="") 
        {
            if(!empty($photo_id) && !empty($author) && !empty($body))
            { 
                $date = date('Y-m-d H:i:s');
                $comment = new Comment();
                $comment->photo_id_fk = $photo_id;
                $comment->author      = $author;
                $comment->body        = $body;
                $comment->time        = $date;

                return $comment;
            }else
            {
                return false;
            }
        }
    public static function find_the_comments($photo_id=0)
    {
        global $database;
        
        $sql = "SELECT comments.id, comments.author, comments.body FROM " . self::$db_table . " INNER JOIN photos ON comments.photo_id_fk = photos.id WHERE photo_id_fk= " . $database->escape_string($photo_id) . " ORDER BY comments.id ASC"; 
        $result = self::find_by_query($sql);
        return $result;
    }
       

    } // end of class comment
?>