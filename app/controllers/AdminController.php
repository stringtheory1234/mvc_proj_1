<?php
    namespace Controllers;
    use Models\Admin;

    class AdminController
    {

        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get()
        {
            session_start();
            $username=$_SESSION['username'];
            if(isset($_SESSION['username'])){
                if($_SESSION['username']=='admin'){
                echo $this->twig->render("admin.html", array(
                    "title" => "Adminpage",
                    "user"=>$username
                )) ;
            }else{
                echo $this->twig->render("user.html", array(
                    "title" => "Welcome",
                    "user"=>$username
                )) ;
            }
            }else{
                header("Location: /");
            }
        }
        public function post(){
            $ques=$_POST['question'];
            $ans=$_POST['answer'];
            if(Admin::addques($ques, $ans)){
                echo "you added a new question!!";
            }else{
                echo "there was some error!!";
            }
        }
        
    }
?>