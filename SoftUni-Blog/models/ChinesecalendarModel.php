<?php

class ChinesecalendarModel extends BaseModel
{
//    TODO: Модела не е готов.
    function getAll()
    {
        $statement = self::$db->query("SELECT * FROM blog.chinese_zodiacs");
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
