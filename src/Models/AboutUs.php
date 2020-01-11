<?php


namespace Models;


class AboutUs
{
    private $connect;
    public function __construct()
    {
        $this->connect= get_connection();
    }

    public function __destruct()
    {
        mysqli_close($this->connect);
    }

    public function getAll()
    {
        $result = mysqli_query($this->connect, "SELECT * FROM `about_us`");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            exit();
        }

        $titles = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $row ['ultimateTime'] = getSeconds($row['updateDate']);
            $titles[] = $row;
        }

        return $titles;
    }
}