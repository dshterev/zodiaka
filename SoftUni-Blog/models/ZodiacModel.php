<?php

class ZodiacModel extends BaseModel
{
//    TODO: Модела не е готов.
    function getAll()
    {
        $statement = self::$db->query("SELECT * FROM blog.zodiacs");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getDaily()
    {
        //Пресмята деня днес в 00:00:00 часа
        $dateNow = date("Y-m-d H:i:s", strtotime("now", mktime(0, 0, 0)));
        //Пресмята деня утре в 00:00:00 часа
        $dateAfterOneDay = date("Y-m-d H:i:s", strtotime("+1 day", mktime(0, 0, 0)));

        $query = "SELECT * FROM blog.zodiacs WHERE date BETWEEN " .
            "'" .$dateNow . "'" .
            " AND ".
            "'" . $dateAfterOneDay . "'" .
            " ORDER BY DATE desc;";

        $statement = self::$db->query($query);
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getMonth()
    {
        //Пресмята деня днес в 00:00:00 часа
        $dateNow = date("Y-m-d H:i:s", strtotime("now", mktime(0, 0, 0)));
        //Пресмята деня след един месец в 00:00:00 часа
        $dateAfterOneMonth = date("Y-m-d H:i:s", strtotime("+1 month", mktime(0, 0, 0)));

        $query = "SELECT * FROM blog.zodiacs WHERE date BETWEEN " .
            "'" .$dateNow . "'" .
            " AND ".
            "'" . $dateAfterOneMonth . "'" .
            " ORDER BY DATE desc;";

        $statement = self::$db->query($query);
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getYear()
    {
        //Пресмята деня днес в 00:00:00 часа
        $dateNow = date("Y-m-d H:i:s", strtotime("now", mktime(0, 0, 0)));
        //Пресмята деня след една година в 00:00:00 часа
        $dateAfterOneYear = date("Y-m-d H:i:s", strtotime("+1 year", mktime(0, 0, 0)));

        $query = "SELECT * FROM blog.zodiacs WHERE date BETWEEN " .
            "'" .$dateNow . "'" .
            " AND ".
            "'" . $dateAfterOneYear . "'" .
            " ORDER BY DATE desc;";

        $statement = self::$db->query($query);
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function create(string $title, string $content, int $user_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)");
        $statement->bind_param("ssi", $title, $content, $user_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public static function getByZodiac(string $zodiac)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM chinese_zodiacs WHERE zodiac_sign = ?"
        );
        $statement->bind_param("i", $zodiac);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function edit (string $id, string $title, string $content,
                          string $date, int $user_id) : bool
    {
        $statement = self::$db->prepare("UPDATE posts SET title = ?, " .
            "content = ?, date = ?, user_id = ? WHERE id = ?");
        $statement->bind_param("sssii", $title, $content, $date, $user_id, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
}
