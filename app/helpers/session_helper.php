<?php
    session_start();

    // Flash message
    // EXAMPLE - flash('register_success', 'You are now registered');
    // DISPLAY IN VIEW - echo flash('register_success');
    function flash($name, $message ="", $class = "alert alert-success") {

        if(empty($message) && !empty($_SESSION[$name])){
            echo '<div class="' . $class .'" id="msg-flash">' .$_SESSION[$name] .'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        } else {
            $_SESSION[$name] = $message;
            $_SESSION[$name. "_class"] = $class;
        }
    }
