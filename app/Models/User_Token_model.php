<?php namespace App\Models;

use CodeIgniter\Model;

class User_Token_model extends Model
{
    protected $table = 'user_tokens';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'token',
        'expires_at',
        'created_at',
        'used'
    ];
}
