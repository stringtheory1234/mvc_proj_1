<?php
    namespace Controllers;
    use Models\Leader;

    class LeaderController
    {

        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get(){
            echo Leader::getleader();
        }
        
    }
?>