<?php 
require_once __DIR__ . "/../repositories/usersrepository.php";
class UserService{
    private $repository;
    public function __construct(){
        $this->repository = new UsersRepository();
    }
    public function getAll(){
        return $this->repository->getAll();
    }
    
    public function getOne($id){
        return $this->repository->getOne($id);
    }
    public function create($user){
        return $this->repository->create($user);
    }
    public function editUser($username, $email, $password,$id){
        return $this->repository->editUser($username, $email, $password,$id);        
    }
    public function delete($id){
        return $this->repository->delete($id);
    }
}