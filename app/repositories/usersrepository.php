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
    function createUser(){
        try{
            $stmt = $this->connection->prepare("INSERT INTO users (username, email, password, usertype) VALUES (:username, :email, :password, :usertype)");
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    } 
    function editUser(){
        try{
            $stmt = $this->connection->prepare("UPDATE users SET username = :username, email = :email, password = :password, usertype = :usertype WHERE id = :id");
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }   
    function deleteUser(){
        try{
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}
