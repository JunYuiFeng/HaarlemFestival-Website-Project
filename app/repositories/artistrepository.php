<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/artist.php';

class ArtistRepositories extends Repository
{
    function getAll()
    {
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
    public function getArtistIdByName($name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id FROM Artists WHERE name = :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();



            $artist = $stmt->fetch(PDO::FETCH_ASSOC);

            return $artist['id'];
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
    public function removeArtist($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Artists WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function updateArtist($id, $name, $style, $firstSong, $secondSong, $thirdSong, $indexPicture, $firstSongSourceCode, $secondSongSourceCode, $thirdSongSourceCode, $detailedPicture, $career)
    {
        try {
            $stmt = $this->connection->prepare("
                UPDATE Artists SET name = :name, style = :style, firstSong = :first_song, secondSong = :second_song, 
                thirdSong = :third_song, detailedPicture = :detailed_picture, 
                indexPicture = :index_picture, career = :career, firstSongSourceCode = :first_song_source_code, 
                secondSongSourceCode = :second_song_source_code, thirdSongSourceCode = :third_song_source_code 
                WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':style', $style);
            $stmt->bindParam(':first_song', $firstSong);
            $stmt->bindParam(':second_song', $secondSong);
            $stmt->bindParam(':third_song', $thirdSong);
            $stmt->bindParam(':detailed_picture', $detailedPicture);
            $stmt->bindParam(':index_picture', $indexPicture);
            $stmt->bindParam(':career', $career);
            $stmt->bindParam(':first_song_source_code', $firstSongSourceCode);
            $stmt->bindParam(':second_song_source_code', $secondSongSourceCode);
            $stmt->bindParam(':third_song_source_code', $thirdSongSourceCode);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function addArtist($name, $style, $firstSong, $secondSong, $thirdSong, $indexPicture, $firstSongSourceCode, $secondSongSourceCode, $thirdSongSourceCode, $detailedPicture, $career)
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO Artists (name, style, firstSong, secondSong, thirdSong, detailedPicture, indexPicture, career, firstSongSourceCode, secondSongSourceCode, thirdSongSourceCode) 
                VALUES (:name, :style, :first_song, :second_song, :third_song, :detailed_picture, :index_picture, :career, :first_song_source_code, :second_song_source_code, :third_song_source_code)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':style', $style);
            $stmt->bindParam(':first_song', $firstSong);
            $stmt->bindParam(':second_song', $secondSong);
            $stmt->bindParam(':third_song', $thirdSong);
            $stmt->bindParam(':detailed_picture', $detailedPicture);
            $stmt->bindParam(':index_picture', $indexPicture);
            $stmt->bindParam(':career', $career);
            $stmt->bindParam(':first_song_source_code', $firstSongSourceCode);
            $stmt->bindParam(':second_song_source_code', $secondSongSourceCode);
            $stmt->bindParam(':third_song_source_code', $thirdSongSourceCode);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>