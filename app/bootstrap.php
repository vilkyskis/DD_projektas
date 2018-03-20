<?php
    // Load config
    require_once "config/config.php";

    // Autoload core libraries
    spl_autoload_register(function ($className){
       require_once "libraries/" . $className . ".php";
    });


    /*
     * NOT IMPORTANT
     * Load libraries
     * require_once "libraries/Core.php";
     * require_once "libraries/Controller.php";
     * require_once "libraries/Database.php";
    */
