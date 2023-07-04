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

            if($statement->fetchColumn() > 0)
            {
                //$this->Update($username, $path, 'users', 'logged', true);
                return true;
            }
            else
            {
                return false;
            }            
        }
        catch(Exception $e)
        {
            die($e);
        }
    }

    private function Update($username, $path, $table, $column, $value)
    {
        $path = strip_tags($path);
        $pdo = new PDO('sqlite:' . $path);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            $statement = $pdo->prepare("UPDATE $table SET $column = :value WHERE name = :name");
            if(is_bool($value))
            {
                $statement->bindParam(':value', $value, PDO::PARAM_BOOL);
            }
            else
            {
                $statement->bindParam(':value', $value, PDO::PARAM_STR);
            }            
            $statement->bindParam(':name', $username, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(Exception $e)
        {
            die($e);
        }
    }
}

?>