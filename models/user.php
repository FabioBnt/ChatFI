<?php

include_once "..\database\dao.php";

class user
{
    private dao $dao;

    public function __construct()
    {
        $this->dao = new dao("user");
    }

    public function select()
    {
        return $this->dao->select();
    }

    public function selectUser($name,$password){
        return $this->dao->selectUser($name,$password);
    }
}