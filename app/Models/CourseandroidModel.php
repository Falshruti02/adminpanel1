<?php 
namespace App\Models;
use CodeIgniter\Model;

class CourseandroidModel extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $allowedFields = ['photo', 'heading', 'info'];   
}




