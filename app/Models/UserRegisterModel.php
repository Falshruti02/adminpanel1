<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserRegisterModel extends Model
{
    protected $table = 'user_register';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'photo'];   
}
?>