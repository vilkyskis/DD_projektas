<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 18.3.8
 * Time: 15.31
 */

interface Login
{
    public function checkUser(string $email, string $password);

}