<?php 
namespace App\Models;
use CodeIgniter\Model;

class CoursemobileModel extends Model
{
    protected $table = 'mcourse';
    protected $primaryKey = 'id';
    protected $allowedFields = ['photo', 'heading', 'info'];   
}