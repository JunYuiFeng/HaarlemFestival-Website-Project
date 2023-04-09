<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';

class DanceRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.id, t.date, t.time, t.session, t.duration, v.name AS venue, GROUP_CONCAT(a.name) AS artist,t.ticketAvailable ,t.price FROM Tickets t JOIN Venues v ON t.venueId = v.id JOIN DanceArtists da ON da.danceId = t.id JOIN Artists a ON da.artistId = a.id GROUP BY t.id;
            ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getTicketById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT `ticketAvailable` FROM `Tickets` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $ticket = $stmt->fetch();

            return $ticket;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getTicketsFromCartByUserId($userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.id, ci.quantity, t.price, t.ticketAvailable, 
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
            $stmt = $this->connection->prepare("SELECT t.id as id, ci.quantity, t.price, t.session, t.ticketAvailable, 
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

    function addDanceTocard($danceId, $userId, $ticketAmount)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO CartItems (cartId, itemId, type, quantity) 
            VALUES ('7149e134-9835-4f40-a4a8-194db4ab0982', :danceId, 'ticket', :ticketAmount);");
            $stmt->bindParam(':danceId', $danceId);
            // $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':ticketAmount', $ticketAmount);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e) {
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

    function deductAvailableTickets($amountToDeduct, $ticketId)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE Tickets
            SET ticketAvailable = ticketAvailable - :amount
            WHERE id = :id;");
            $stmt->bindParam(':amount', $amountToDeduct);
            $stmt->bindParam(':id', $ticketId);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    public function removeTicket($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Tickets WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function addDanceArtist($danceId, $artistId)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO DanceArtists (danceId, artistId) VALUES (:danceId, :artistId)");
            $stmt->bindParam(':danceId', $danceId);
            $stmt->bindParam(':artistId', $artistId);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function addDance($date, $time, $venueId, $artistId, $ticketAmount, $price)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO Tickets (date, time, venueId, ticketAvailable, price, session, duration) VALUES (:date , :time, :venueId, :ticketAmount , :price, 'club', '09:00:00');
            SET @last_id_in_tickets = LAST_INSERT_ID();
            INSERT INTO DanceArtists (danceId, artistId) VALUES (@last_id_in_tickets, :artistId);
            ");
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':venueId', $venueId);
            $stmt->bindParam(':artistId', $artistId);
            $stmt->bindParam(':ticketAmount', $ticketAmount);
            $stmt->bindParam(':price', $price);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteDanceArtistsByDanceId($danceId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM DanceArtists WHERE danceId = :danceId");
            $stmt->bindParam(':danceId', $danceId);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function updateDance($id, $date, $time, $venueId, $ticketAmount, $price)
    {
        try {
            $stmt = $this->connection->prepare("            UPDATE Tickets t
                JOIN Venues v ON v.id = t.venueId
                JOIN DanceArtists da ON da.danceId = t.id
                SET t.date = :date,
                    t.time = :time,
                    t.venueId = :venueId,
                    t.ticketAvailable = :ticketAmount,
                    t.price = :price
                WHERE t.id = :id;       
            ");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':venueId', $venueId);
            $stmt->bindParam(':ticketAmount', $ticketAmount);
            $stmt->bindParam(':price', $price);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateDaceFor2Artists($id, $date, $time, $venueId, $artistId, $artistId2, $ticketAmount, $price)
    {
        try {
            $stmt = $this->connection->prepare("ALTER TABLE DanceArtists DROP FOREIGN KEY DanceArtists_ibfk_2;
            
            UPDATE Tickets t
                JOIN Venues v ON v.id = t.venueId
                JOIN DanceArtists da ON da.danceId = t.id
                JOIN Artists a ON a.id = da.artistId
                SET t.date = :date,
                    t.time = :time,
                    t.venueId = :venueId,
                    da.artistId = :artistId,
                    t.ticketAvailable = :ticketAmount,  
                    t.price = :price
                WHERE t.id = :id;       


            ALTER TABLE DanceArtists ADD CONSTRAINT DanceArtists_ibfk_2 FOREIGN KEY (artistId) REFERENCES Artists (id) ON DELETE CASCADE ON UPDATE CASCADE;
            ");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':venueId', $venueId);
            $stmt->bindParam(':artistId', $artistId);
            $stmt->bindParam(':artistId2', $artistId2);
            $stmt->bindParam(':ticketAmount', $ticketAmount);
            $stmt->bindParam(':price', $price);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateDaceFor3Artists($id, $date, $time, $venueId, $artistId, $artistId2, $artistId3, $ticketAmount, $price)
    {
        try {
            $stmt = $this->connection->prepare("ALTER TABLE DanceArtists DROP FOREIGN KEY DanceArtists_ibfk_2;
            UPDATE Tickets t
                JOIN Venues v ON v.id = t.venueId
                JOIN DanceArtists da ON da.danceId = t.id
                JOIN Artists a ON a.id = da.artistId
                SET t.date = :date,
                    t.time = :time,
                    t.venueId = :venueId,
                    da.artistId = :artistId,
                    t.ticketAvailable = :ticketAmount,
                    t.price = :price
                WHERE t.id = :id;       
            ALTER TABLE DanceArtists ADD CONSTRAINT DanceArtists_ibfk_2 FOREIGN KEY (artistId) REFERENCES Artists (id) ON DELETE CASCADE ON UPDATE CASCADE;
            ");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':venueId', $venueId);
            $stmt->bindParam(':artistId', $artistId);
            $stmt->bindParam(':artistId2', $artistId2);
            $stmt->bindParam(':artistId3', $artistId3);
            $stmt->bindParam(':ticketAmount', $ticketAmount);
            $stmt->bindParam(':price', $price);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
