<?php

    namespace Controllers;

    class HomeController
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
            if(isset($_SESSION['username'])){
                header("Location: /user");
            }else{
                echo $this->twig->render("home.html", array(
                    "title" => "Login")) ;
            }
            
        }
    }
?>