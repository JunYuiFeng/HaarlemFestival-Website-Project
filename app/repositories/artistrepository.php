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
        public function getArtistById($id)
        {
            try {
                $stmt = $this->connection->prepare("SELECT * FROM Artists WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
                $artist = $stmt->fetch();

                return $artist;
            } catch (PDOException $e) {
                echo $e;
            }
        }
    }

?>