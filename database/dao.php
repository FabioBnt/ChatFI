<?php

namespace database;

use Exception;
use PDO;

class dao
{
    // table name
    private string $table;
    private string $db = "u563109936_chatfi";
    private string $user = "u563109936_chatfiuser";
    private string $pwd = "2Ba[OKfV[pe[";
    private string $host = "145.14.156.192";

    private PDO $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8mb4", $this->user, $this->pwd);
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

    public function selectUser($name,$password){
        $sql = "SELECT * FROM $this->table WHERE name = '$name' AND password = '$password'";
        return $this->pdo->query($sql)->fetchAll();
    }

    // insert a message
    public function insert($data): bool
    {
        // add timestamp
        $timestamp = date("Y-m-d H:i:s");
        // check special characters
        $author = htmlspecialchars($data["author"]);
        $content = htmlspecialchars($data["content"]);
        $sql = "INSERT INTO $this->table (author, content, timestamp) VALUES (:author, :content, :timestamp)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array(':author' => $author, ':content' => $content, ':timestamp' => $timestamp));
    }


    // get n latest messages
    public function selectNLatest($n): array
    {
        // if n is not an integer, exception
        if (!is_int($n)) {
            throw new Exception("n must be an integer");
        }
        // if n is negative, exception
        if ($n < 0) {
            throw new Exception("n must be positive");
        }
        // if n is 0, return empty array
        if ($n == 0) {
            return array();
        }
        $sql = "SELECT * FROM $this->table ORDER BY id DESC LIMIT $n";
        // reverse the array then return it
        return array_reverse($this->pdo->query($sql)->fetchAll());
    }
}