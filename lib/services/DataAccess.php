<?php

class DataAccess
{
    public function Login($username, $password, $path)
    {
        $path = strip_tags($path);
        $pdo = new PDO('sqlite:' . $path);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            $statement = $pdo->prepare("SELECT COUNT(*) FROM users WHERE name = :name AND password = :password");
            $statement->bindParam(':name', $username, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->execute();            

            return $statement->fetchColumn() > 0;
        }
        catch(Exception $e)
        {
            die($e);
        }
    }
}

?>