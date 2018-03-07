<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 18.3.7
 * Time: 17.55
 */

abstract class User
{
    private $email = null;
    private $password = null;

    /**
     * User constructor.
     * @param String $email
     * @param String $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return null|String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return null|String
     */
    public function getPassword()
    {
        return $this->password;
    }


}