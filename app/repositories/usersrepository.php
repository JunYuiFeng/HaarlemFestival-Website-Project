<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

class UsersRepository extends Repository
{
    function getAll() 
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
            $users = $stmt->fetchAll();

            return $users;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    
}
