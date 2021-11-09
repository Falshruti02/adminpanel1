<?php 
namespace App\Models;
use CodeIgniter\Model;

class CoursewebModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['photo', 'heading', 'info', 'created_at'];   
}
?>