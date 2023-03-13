<?php
require_once __DIR__ . '/../repositories/usersrepository.php';

class UsersService 
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function getByUsername($username)
    {
        return $this->repository->getByUsername($username);
    }

    public function getByEmail($email)
    {
        return $this->repository->getByEmail($email);
    }
}