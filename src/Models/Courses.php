<?php


namespace Models;


class Courses
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

    public function getAll()
    {

        $result = mysqli_query($this->connect, "SELECT * FROM `courses`");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            exit();
        }


        $courses = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $row ['ultimateTime'] = getSeconds($row['updateTime']);
            $courses[] = $row;
        }


        mysqli_free_result($result);


        return $courses;
    }
}