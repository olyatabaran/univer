<?php

$connect = get_connection();

$result = mysqli_query($connect, "SELECT * FROM `departments` WHERE id = $id");
if (!$result) {
    printf("Сообщение ошибки: %s\n", mysqli_error($connect));
    exit();
}

$department = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($connect);

