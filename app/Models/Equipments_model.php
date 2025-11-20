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
        'description',
        'category',
        'quantity',
        'avail_count',
        'status',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
}
?>