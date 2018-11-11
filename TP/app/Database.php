<?php
/**
 * POO_Graf - Database.php
 * User: Trinh
 */
namespace App;

use PDO;

class Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    { // si mon objet, donc database n'a pas propriété pdo
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', '');// initialiser
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // définir attribue
            $this->pdo = $pdo; // stoker dans l'instance
        }
        return $this->pdo;
    }

    public function query($statement)
    {
        $req = $this->getPDO()->query($statement);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}