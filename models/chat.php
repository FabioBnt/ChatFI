<?php
include_once "..\database\dao.php";

class chat
{
    private dao $dao;
    public function __construct()
    {
        $this->dao = new dao("chat");
    }
    public function select()
    {
        return $this->dao->select();
    }
    public function selectUser($name,$password){
        return $this->dao->selectUser($name,$password);
    }
    public function insert($data): bool
    {
        return $this->dao->insert($data);
    }
    public function selectNLatest($n): array
    {
        return $this->dao->selectNLatest($n);
    }

    public function getAuthorNames(): array
    {
        $data = $this->dao->select();
        $names = [];
        foreach ($data as $row) {
            $names[] = $row["author"];
        }
        return $names;
    }
}
