<?php
    class Pages extends Controller {

        public function __construct() {

        }

        public function index(){

            $data = [
                "title" => "Welcome",
                "description" => "Simple login demonstration"
            ];

            $this->view("pages/index", $data);
        }

        public function about(){
            $data = [
                "title" => "About",
                "description" => "Custom object oriented PHP MVC framework and login system with registration"
            ];

            $this->view("pages/about", $data);
        }
    }