<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';

class DanceRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.id, t.date, t.time, t.session, 
            t.duration, v.name AS venue, GROUP_CONCAT(a.name) 
            AS artist,t.ticketAvailable ,t.price FROM Tickets t 
            JOIN Venues v ON t.venueId = v.id 
            JOIN DanceArtists da ON da.danceId = t.id 
            JOIN Artists a ON da.artistId = a.id 
            GROUP BY t.id;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getTicketsFromCartByUserId($userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.id, ci.quantity, t.price, 
            COALESCE(GROUP_CONCAT(DISTINCT a.name SEPARATOR ', '), '') AS artist, 
            COALESCE(GROUP_CONCAT(DISTINCT v.name SEPARATOR ', '), '') AS venue, 
            t.date, t.session 
     FROM Carts c 
     JOIN CartItems ci ON c.Id = ci.cartId 
     JOIN Tickets t ON ci.itemId = t.id 
     LEFT JOIN DanceArtists da ON t.id = da.danceId 
     LEFT JOIN Artists a ON da.artistId = a.id 
     LEFT JOIN Venues v ON t.venueId = v.id 
     WHERE c.userId = :userId 
     GROUP BY t.id, t.session;");
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $tickets = $stmt->fetchAll();

            return $tickets;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getTicketFromCartByCartId($cartId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.id as id, ci.quantity, t.price, t.session,
            COALESCE(GROUP_CONCAT(DISTINCT a.name SEPARATOR ', '), '') as artist,
            COALESCE(GROUP_CONCAT(DISTINCT v.name SEPARATOR ', '), '') as venue,
            t.date 
          FROM Carts c 
          JOIN CartItems ci ON c.Id = ci.cartId 
          JOIN Tickets t ON ci.itemId = t.id 
          LEFT JOIN DanceArtists da ON t.id = da.danceId 
          LEFT JOIN Artists a ON da.artistId = a.id 
          LEFT JOIN Venues v ON t.venueId = v.id 
          WHERE c.Id = :cartId
          GROUP BY t.id, t.session;");
            $stmt->bindParam(':cartId', $cartId);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $tickets = $stmt->fetchAll();

            return $tickets;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAllDate()
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT date FROM Tickets");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAllArtist()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Artists");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $artists = $stmt->fetchAll();

            return $artists;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAllByDate($date)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Tickets` WHERE date = :date ORDER BY `Dance`.`id` ASC");

            $stmt->bindParam(':date', $date);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getArtistById()
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT artist FROM Dance");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getArtistsBySession()
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT artist FROM Dance WHERE session = 'Club'");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Tickets WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
            $restaurant = $stmt->fetch();

            return $restaurant;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getFromCartByUserId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT *
            FROM Tickets
            WHERE id IN (
                SELECT itemId
                FROM CartItems
                WHERE cartId = (
                    SELECT id
                    FROM Carts
                    WHERE userId = :id))");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $tickets = $stmt->fetchAll();

            return $tickets;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function removeTicketFromCart($ticketId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `CartItems` WHERE `itemId` = :itemId AND `type` = 'ticket'");
            $stmt->bindParam(':itemId', $ticketId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
