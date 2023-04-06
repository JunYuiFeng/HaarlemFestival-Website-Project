<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/tickettoken.php';

class TicketTokenRepository extends Repository
{
    /**
     * @return TicketToken
     * @param string $token
     */
    function getByToken($token)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `TicketTokens` WHERE token = :token");
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "TicketToken");
            $token = $stmt->fetch();

            return $token;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `TicketTokens` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "TicketToken");
            $token = $stmt->fetch();

            return $token;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `TicketTokens` ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "TicketToken");
            $tokens = $stmt->fetchAll();

            return $tokens;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function create(TicketToken $ticketToken): bool
    {
        try {
            $sql = 'INSERT INTO `TicketTokens`(`token`, `orderItemId`) VALUES (:token, :orderItemId)';

            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':token' => $ticketToken->getToken(),
                ':orderItemId' => $ticketToken->getOrderItemId(),
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    function delete(TicketToken $ticketToken): bool
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `TicketTokens` WHERE token = :token");
            return $stmt->execute([
                ':token' => $ticketToken->getToken()
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
    
    function setUsed ($token): bool
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `TicketTokens` SET isUsed = 1 WHERE token = :token");
            return $stmt->execute([
                ':token' => $token
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

}
