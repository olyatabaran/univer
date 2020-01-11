<?php


namespace Models;


class Department
{
    private $connect;

    public function __construct()
    {
        $this->connect = get_connection();
    }
    public function __destruct()
    {
        mysqli_close($this->connect);
    }

    public function getDepartment($id)
    {

        $result = mysqli_query($this->connect, "SELECT * FROM `departments` WHERE id = $id");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            exit();
        }

        $department = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        return $department;
    }

    public function getDepartments()
    {
        $result = mysqli_query($this->connect, "SELECT * FROM `departments`");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            exit();
        }

        $departments = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $departments[] = $row;
        }

        return $departments;
    }

}