<?php


    class Session{

        private $signed_in = false;
        public $user_id;
        public $message;
        public $count;

        function __construct(){

            session_start();
            $this->check_the_login();
            $this->check_message();
            $this->visitor_count();
        }
        

        public function message($msg = ""){
            if(!empty($msg)){
                $_SESSION['message'] = $msg;
            } else{
                return $this->message;
            }
        }
        public function visitor_count(){
            if(isset($_SESSION['count']))
            {
                $this->count = $_SESSION['count']++;
            }else{
                $_SESSION['count'] = 1;
            }
        }

        public function check_message(){
            if(isset($_SESSION['message'])){
                $this->message = $_SESSION['message'];
                unset($_SESSION['message']);
            }else{
                $this->message = "";
            }
        }





        public function is_signed_in(){

            return $this->signed_in;
        }
        
        public function login($user){

            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
        
        private function check_the_login(){

            if(isset($_SESSION['user_id'])){
                $this->user_id = $_SESSION['user_id'];
                $this->signed_in = true;
            }else{
                unset($this->user_id);
                $this->signed_in = false;
            }
        }

        public function logout(){

            unset($_SESSION['user_id']);
            unset($this->user_id);
            $this->signed_in = false;
        }




    }

    $session = new Session();
?>