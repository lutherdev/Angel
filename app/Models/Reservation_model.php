<?php
namespace App\Models;

use CodeIgniter\Model;

class Reservation_model extends Model {
    protected $table = 'tblreservations';

    protected $primaryKey = 'reservation_id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'user_id',
        'equipment_id',
        'reserved_date',
        'status'
    ];

    protected bool $allowEmptyInserts = false;
}
?>