<?php
/**
 * POO_Graf - Table.php
 * User: Trinh
 */

namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $db;
    protected $table;

    /**
     * Table constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
        if ($this->table === null) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    /**
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function query($statement, $attributes = null, $one = false)
    {
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }

    }

    /**
     * @param $id
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function find($id)
    {
        return $this->query('SELECT * FROM ' . $this->table . ' WHERE id = ? ', [$id], true);
    }

    /**
     * @param $id
     * @param $fields
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $key => $value){ //on n'injectera pas $value, on doit faire un requête préparé
            $sql_parts[] = "$key = ?";
            $attributes[] = $value; // on inscrémente à chaque fois de la valeur
        }
        $attributes[] = $id; // ajouter un dernier valeur : id
        $sql_parts = implode(',',$sql_parts);
        return $this->query('UPDATE ' . $this->table . ' SET '. $sql_parts . ' WHERE id = ?', $attributes, true);
        // SET $key='valeur', premier point d'interogation, on a la valeur de la clé titre, deuxième point d'interogation correspond à contenu, 3e est catégory, et le 4e point d'interogation ajouté en dernier correspond à WHERE id = ?
    }

    /**
     * @param $fields
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $key => $value){
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $sql_parts = implode(',',$sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_parts", $attributes, true);
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function extract($key, $value) : array
    {
        $records = $this->all();
        // définir un tableau de sortie
        $return = [];
        //Pour tout les enregistrements, on crée un tableau
        foreach ($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

}