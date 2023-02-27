<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restaurant.php';

class RestaurantRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Restaurants");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Restaurant");
            $restaurants = $stmt->fetchAll();

            return $restaurants;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}