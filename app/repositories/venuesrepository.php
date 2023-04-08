<?php

require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';
require_once __DIR__ . '/../models/venue.php';

class VenueRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Venues");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Venue");
            $venues = $stmt->fetchAll();

            return $venues;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function editVenue($id, $name, $address, $image)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE Venues SET name = :name, address = :address, image = :image WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':image', $image);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    function addVenue($name, $address, $image)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO Venues (name, address, image) VALUES (:name, :address, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':image', $image);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    function removeVenue($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Venues WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function getVenueIdByName($name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id FROM Venues WHERE name = :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            $venue = $stmt->fetch(PDO::FETCH_ASSOC);
            return $venue['id'];

        } catch (PDOException $e) {
            echo $e;
        }

    }
}
?>