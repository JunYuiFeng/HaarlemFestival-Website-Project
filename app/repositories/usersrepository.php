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
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function createUser($username, $email, $password, $userType)
    {
        try {
            $sql = 'INSERT INTO `Users`(`username`, `email`, `password`, `userType`) VALUES (:username, :email, :password, :userType)';

            $statement = $this->connection->prepare($sql);

            $statement->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $password,
                ':userType' => $userType,
            ]);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function editUser($username,$email,$password,$id){
        try{
            $stmt = $this->connection->prepare('UPDATE Users SET username = :username, email = :email, password = :password WHERE id = :id');
            $stmt->execute(array(':username' =>$username, ':email' => $email, ':password' => $password, ':id' => $id));
        } catch (PDOException $e)
        {
            echo $e;
        }
    }   
    function deleteUser($id){
        try{
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

}
