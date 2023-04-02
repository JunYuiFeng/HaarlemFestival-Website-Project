<?php

require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/dance.php';
require_once __DIR__ . '/../models/venue.php';

class VenueRepository extends Repository
{
    function getAll(){
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
}
?>