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
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if ($user){
            return $user->password === sha1($password);
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