<?php

require_once __DIR__ . '/../repositories/artistrepository.php';
class ArtistService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ArtistRepositories();
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function getArtistById($id)
    {
        return $this->repository->getArtistById($id);
    }
    public function removeArtist($id)
    {
        return $this->repository->removeArtist($id);
    }
    public function getArtistIdByName($name)
    {
        return $this->repository->getArtistIdByName($name);
    }
    public function addArtist($name,$style,$firstSong,$secondSong,$thirdSong,$indexPicture,$firstSongSourceCode,$secondSongSourceCode,$thirdSongSourceCode,$detailedPicture,$career)
    {
        return $this->repository->addArtist($name,$style,$firstSong,$secondSong,$thirdSong,$indexPicture,$firstSongSourceCode,$secondSongSourceCode,$thirdSongSourceCode,$detailedPicture,$career);
    }
    public function updateArtist($id,$name, $style,$firstSong,$secondSong,$thirdSong,$indexPicture,$firstSongSourceCode,$secondSongSourceCode,$thirdSongSourceCode,$detailedPicture,$career)
    {
        return $this->repository->updateArtist($id,$name, $style,$firstSong,$secondSong,$thirdSong,$indexPicture,$firstSongSourceCode,$secondSongSourceCode,$thirdSongSourceCode,$detailedPicture,$career);
    }
}

?>