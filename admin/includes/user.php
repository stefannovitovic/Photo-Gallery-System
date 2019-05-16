<?php

require_once("db_object.php");
    class User extends Db_object{
        
        protected static $db_table = "users";

        protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $user_image;
        public $upload_directory = "images";
        public $image_placeholder = "https://placeimg.com/150/150/arch";
        public $errors = array();
        public $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );

        public function photo_dir(){
            
            return $this->upload_directory . DS . $this->user_image;
        }

        public function set_file($file){

            if(empty($file) || !$file || !is_array($file)){
                $this->errors[] = "There was no file uploaded here";
                return false;
            }
            
            if($file['error'] != 0){

                $this->errors[] = $this->phpFileUploadErrors[$file['error']];
                return false;

            } else {
                
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];

            }
        }

        public function save_user_image(){

          
                if(!empty($this->errors)){
                    return false;
                }
                if(empty($this->user_image) || empty($this->tmp_path)){
                    $this->errors[] = "the file was not available!";
                    return false;
                }

                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

                if(file_exists($target_path)){
                    $this->errors[] = "The file {$this->user_image} already exists!";
                    return false;
                }

                if(move_uploaded_file($this->tmp_path, $target_path)){
                        if($this->create()){
                            unset($this->tmp_path);
                            return true;
                        }
                }else {
                    $this->errors[] = "Something went wrong, try again later!";
                    return false;
                }
        }
        
        public static function verify_user($username, $password){

            global $database; 
            $username = $database->escape_string($username);
            $password = $database->escape_string($password);

            $sql = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
            $result_set_array = self::find_by_query($sql);
            return !empty($result_set_array) ? array_shift($result_set_array) : false;

        }
        
        public function image_path_and_placeholder(){
            return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
        }
        public function delete_user_photo(){

            if($this->delete()){
                $target_path = SITE_ROOT . DS . "admin" . DS . $this->photo_dir();
                unlink($target_path);
            }
        }



    } // end of class User



?>