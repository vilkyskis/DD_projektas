<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 18.3.7
 * Time: 18.08
 */

include_once "contracts/User.php";

final class Student implements User
{
    private $email;
    private $password;

    /**
     * Student constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}