<?php
/**
 * POO_Graf - CategoryEntityphp
 * User: Trinh
 */
namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?page=categorie&id=' . $this->id;
    }
}