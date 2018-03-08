<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 18.3.7
 * Time: 18.16
 */

include_once "Student.php";

final class University
{
    private $title;
    private $students = [];

    /**
     * University constructor.
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }


    /**
     * @param $student Student
     */
    public function addStudent($student)
    {
        $this->students[] = $student;
    }


    /**
     * @param $email String
     * @return Student|null
     */
    public function getStudent($email)
    {
        foreach ($this->students as $student) {
            if ($student->getEmail() === $email)
                return $student;
        }

        return null;
    }
}
