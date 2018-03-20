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
                "description" => "Karolis Černiauskis IFF-6/1"
            ];

            $this->view("pages/about", $data);
        }
    }