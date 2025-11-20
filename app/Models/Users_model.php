<?php
namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model {
    protected $table = 'tblusers';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'username',
        'password',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'role',
        'status',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
}
?>