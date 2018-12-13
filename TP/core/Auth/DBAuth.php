<?php
/**
 * POO_Graf - DBAuth.php
 * User: Trinh
 */

namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{
    /**
     * @var Database
     */
    private $db;

    /**
     * DBAuth constructor
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Méthode permet de connaitre l'id de l'utilisateur
     * @return boolean
     */
    public function getUserId() : bool
    {
        // Si l'utilisateur connecté, on retourne $_SESSION['auth'] qui contiendra l'id de l'utilisateur
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password) : bool
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if ($user && $user->password === sha1($password)){
            $_SESSION['auth'] = $user->id; // sauvegarder l'id de l'utilisateur en session
            return true;
        }
        return false;
    }

    /**
     * @return boolean
     */
    public function logged() : bool
    {
        return isset($_SESSION['auth']);
    }
}