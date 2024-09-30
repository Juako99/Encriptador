<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model{
    protected $table      = 'users';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'active'];
    protected $useTimestamps = true;
}