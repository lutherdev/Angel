<?php
namespace App\Models;

use CodeIgniter\Model;

class Equipments_model extends Model {
    protected $table = 'tblequipments';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'name',
        'quantity'
    ];

    protected bool $allowEmptyInserts = false;
}
?>