<?php
namespace App\Models;

use CodeIgniter\Model;

class Borrow_model extends Model {
    protected $table = 'tblborrow';

    protected $primaryKey = 'borrow_id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'user_id',
        'equipment_id',
        'quantity',
        'borrow_date',
        'return_date',
        'status'
    ];

    protected bool $allowEmptyInserts = false;
}
?>