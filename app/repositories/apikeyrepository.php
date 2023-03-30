<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/apikey.php';

class APIKeyRepository extends Repository
{
    function getByToken($token)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `APIKeys` WHERE token = :token");
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "APIKey");
            $token = $stmt->fetch();

            return $token;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `APIKeys` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "APIKey");
            $token = $stmt->fetch();

            return $token;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `APIKeys` ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "APIKey");
            $tokens = $stmt->fetchAll();

            return $tokens;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function create(APIKey $apiKey): bool
    {
        try {
            $sql = 'INSERT INTO `APIKeys`(`token`) VALUES (:token)';

            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':token' => $apiKey->getToken(),
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    function delete(APIKey $apiKey): bool
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `APIKeys` WHERE token = :token");
            return $stmt->execute([
                ':token' => $apiKey->getToken()
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
}
