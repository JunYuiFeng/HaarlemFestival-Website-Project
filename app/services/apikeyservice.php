<?php
require_once __DIR__ . '/../repositories/apikeyrepository.php';

class APIKeyService 
{
    private $repository;

    function __construct()
    {
        $this->repository = new APIKeyRepository();
    }

    function getByToken($token)
    {
        return $this->repository->getByToken($token);
    }

    function getById($id)
    {
        return $this->repository->getById($id);
    }

    function getAll()
    {
        return $this->repository->getAll();
    }

    function create()
    {
        $apiKey = new APIkey();
        $apiKey->setToken(bin2hex(random_bytes(32))); // Generating 64 characters long string for token
        return $this->repository->create($apiKey);
    }

    function delete(APIKey $apiKey)
    {
        return $this->repository->delete($apiKey);
    }

}