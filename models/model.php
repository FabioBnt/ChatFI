<?php

class model
{
    private $db = "id20339000_chatfi";
    private $user = "id20339000_fabisma";
    private $pwd = "wkr?#m7anztnR7lE";
    private $host = "localhost";

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pwd);
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

    public function select($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->pdo->query($sql)->fetchAll();
    }

}
