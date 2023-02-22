<?php
class model
{
    // table name
    private $table;
    private $db = "u563109936_chatfi";
    private $user = "u563109936_chatfiuser";
    private $pwd = "2Ba[OKfV[pe[";
    private $host = "145.14.156.192";

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
        // add timestamp
        $timestamp = date("Y-m-d H:i:s");
        $sql = "INSERT INTO $this->table (timestamp,author, content) VALUES ($timestamp,:author, :content)";
        // check special characters
        $data["author"] = htmlspecialchars($data["author"]);
        $data["content"] = htmlspecialchars($data["content"]);  
        return $this->pdo->prepare($sql)->execute($data);
    }

    // get n latest messages
    public function selectNLatest($n)
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
        return $this->pdo->query($sql)->fetchAll();
    }

}
