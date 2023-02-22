<?php
class model
{
    // table name
    private $table;
    private string $db = "u563109936_chatfi";
    private string $user = "u563109936_chatfiuser";
    private string $pwd = "2Ba[OKfV[pe[";
    private string $host = "145.14.156.192";

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
    public function insert($data): bool
    {
        $sql = "INSERT INTO $this->table (timestamp,author, content) VALUES (:timestamp,:author, :content)";
        return $this->pdo->prepare($sql)->execute($data);
    }

    // get n latest messages
    public function selectNLatest($n)
    {
        $sql = "SELECT * FROM $this->table ORDER BY id DESC LIMIT $n";
        return $this->pdo->query($sql)->fetchAll();
    }

}
