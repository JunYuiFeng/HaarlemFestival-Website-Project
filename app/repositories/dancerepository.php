<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/dance.php';

class DanceRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Dance` ORDER BY `Dance`.`id` ASC");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Dance");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function getAllArtist(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Artists");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Dance");
            $artists = $stmt->fetchAll();

            return $artists;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function getAllByDate($date){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Dance` WHERE date = :date ORDER BY `Dance`.`id` ASC");
            
            $stmt->bindParam(':date', $date);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Dance");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function getArtistById(){
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT artist FROM Dance");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Dance");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function getArtistsBySession()
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT artist FROM Dance WHERE session = 'Club'");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Dance");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }  

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Dance WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
            $restaurant = $stmt->fetch();

            return $restaurant;

        } catch (PDOException $e) 
        {
            echo $e;
        }
    }
}