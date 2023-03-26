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

    
    function getByUsername($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;

        } catch (PDOException $e) 
        {
            echo $e;
        }
    }

    function getByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) 
        {
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

    function editUserTest($username,$email,$id) {
        try{
            $stmt = $this->connection->prepare('UPDATE Users SET username = :username, email = :email WHERE id = :id');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;

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

    function setResetLinkToken($userEmail, $token)
    {
        try {
            $sql = 'UPDATE `Users` SET `resetLinkToken`=:token WHERE `email`=:userEmail';

            $statement = $this->connection->prepare($sql);

            $statement->execute([
                ':token' => $token,
                ':userEmail' => $userEmail,
            ]);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getResetLinkToken($token)
    {
        try {
            $sql = 'SELECT * FROM Users WHERE `resetLinkToken`=:token';

            $statement = $this->connection->prepare($sql);

            $statement->execute([
                ':token' => $token,
            ]);

            $statement->setFetchMode(PDO::FETCH_CLASS, "User");
            $user = $statement->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function setNewPassword($password, $id): bool
    {
        try {
            $sql = 'UPDATE `Users` SET `password`=:password WHERE `id`=:id ';

            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':password' => $password,
                ':id' => $id,
            ]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
}


