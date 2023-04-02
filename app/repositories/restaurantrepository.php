<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restaurant.php';

class RestaurantRepository extends Repository
{
    function getAll(): array
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Restaurants");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Restaurant");
            $restaurants = $stmt->fetchAll();

            return $restaurants;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id): Restaurant
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Restaurants WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
            $restaurant = $stmt->fetch();

            return $restaurant;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    function insertRestaurant(Restaurant $restaurant): bool
    {
        try {
            $sql = 'INSERT INTO `Restaurants` (`name`, `cuisine`, `foodType`, `sessionDuration`, `priceIndicator`, `priceAge12AndUnder`, `rating`, `hasMichelin`, `isFestival`, `priceAboveAge12`, `phoneNumber`, `address`, `seats`, `website`, `coverImg`, `description`) VALUES (:name, :cuisine, :foodType, :sessionDuration, :priceIndicator, :priceAge12AndUnder, :rating, :hasMichelin, :isFestival, :priceAboveAge12, :phoneNumber, :address, :seats, :website, :coverImg, :description)';

            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':name' => $restaurant->getName(),
                ':cuisine' => $restaurant->getCuisine(),
                ':foodType' => $restaurant->getFoodType(),
                ':sessionDuration' => $restaurant->getSessionDuration(),
                ':priceIndicator' => $restaurant->getPriceIndicator(),
                ':priceAge12AndUnder' => $restaurant->getPriceAge12AndUnder(),
                ':rating' => $restaurant->getRating(),
                ':hasMichelin' => $restaurant->getHasMichelin() ? 1 : 0,
                ':isFestival' => $restaurant->getIsFestival() ? 1 : 0,
                ':priceAboveAge12' => $restaurant->getPriceAboveAge12(),
                ':phoneNumber' => $restaurant->getPhoneNumber(),
                ':address' => $restaurant->getAddress(),
                ':seats' => $restaurant->getSeats(),
                ':website' => $restaurant->getWebsite(),
                ':coverImg' => $restaurant->getCoverImg(),
                ':description' => $restaurant->getDescription()
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    function updateRestaurant($restaurant, $id)
    {
        try {
            $stmt = $this->connection->prepare('UPDATE Restaurants SET `name` = :name, `cuisine` = :cuisine, `foodType` = :foodType, `sessionDuration` = :sessionDuration, `priceIndicator`=:priceIndicator, `priceAge12AndUnder`=:priceAge12AndUnder, `rating`=:rating, `hasMichelin`=:hasMichelin, `isFestival`=:isFestival, `priceAboveAge12`=:priceAboveAge12, `phoneNumber`=:phoneNumber, `address`=:address, `seats`=:seats, `website`=:website, `coverImg`=:coverImg, `description`=:description WHERE id = :id');
            return $stmt->execute([
                ':name' => $restaurant->getName(),
                ':cuisine' => $restaurant->getCuisine(),
                ':foodType' => $restaurant->getFoodType(),
                ':sessionDuration' => $restaurant->getSessionDuration(),
                ':priceIndicator' => $restaurant->getPriceIndicator(),
                ':priceAge12AndUnder' => $restaurant->getPriceAge12AndUnder(),
                ':rating' => $restaurant->getRating(),
                ':hasMichelin' => $restaurant->getHasMichelin() ? 1 : 0,
                ':isFestival' => $restaurant->getIsFestival() ? 1 : 0,
                ':priceAboveAge12' => $restaurant->getPriceAboveAge12(),
                ':phoneNumber' => $restaurant->getPhoneNumber(),
                ':address' => $restaurant->getAddress(),
                ':seats' => $restaurant->getSeats(),
                ':website' => $restaurant->getWebsite(),
                ':coverImg' => $restaurant->getCoverImg(),
                ':description' => $restaurant->getDescription(),
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteRestaurant($id): bool
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `Restaurants` WHERE id = :id");
            return $stmt->execute([
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
}
