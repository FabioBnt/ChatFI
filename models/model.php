<?php

class model
{
    // table name
    private $table;
    private $db = "id20339000_chatfi";
    private $user = "id20339000_fabisma";
    private $pwd = "wkr?#m7anztnR7lE";
    private $host = "localhost";

    private PDO $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pwd);
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

    public function select()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->pdo->query($sql)->fetchAll();
    }

    // insert a message
    public function insert($data)
    {
        $sql = "INSERT INTO $this->table (author, content) VALUES (:author, :content)";
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($data);
        return $res;
    }

    // get n latest messages
    public function selectNLatest($n)
    {
        $sql = "SELECT * FROM $this->table ORDER BY id DESC LIMIT $n";
        return $this->pdo->query($sql)->fetchAll();
    }

}
