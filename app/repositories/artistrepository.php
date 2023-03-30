<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/artist.php';

    class ArtistRepositories extends Repository
    {
        function getAll(){
            try {
                $stmt = $this->connection->prepare("SELECT * FROM Artists");
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
                $artists = $stmt->fetchAll();

                return $artists;
            } catch (PDOException $e) {
                echo $e;
            }
        }   
    }

?>