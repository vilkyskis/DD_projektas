<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 18.3.8
 * Time: 15.34
 */

include_once "contracts/Login.php";
include_once "University.php";

final class Authorization implements Login
{
    private $university;

    /**
     * Authorization constructor.
     * @param University $university
     */
    public function __construct($university)
    {
        $this->university = $university;
    }


    /**
     * @param string $email
     * @return null|Student
     */
    private function getUser(string $email)
    {
        return $this->university->getStudent($email);
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function checkUser(string $email, string $password)
    {
        $user = $this->getUser($email);
        if (isset($user)) {
            if ($user->getPassword() == $password)
                return true;
        }
        return false;
    }
}