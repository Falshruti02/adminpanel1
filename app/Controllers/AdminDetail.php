<?php
namespace App\Controllers;
use App\Models\CoursewebModel;
use App\Models\CourseandroidModel;
use App\Models\CoursemobileModel;
use CodeIgniter\Controller;


class AdminDetail extends BaseController
{
	public function courses()
    {      
    	// $course = new DetailModel();
    	// $data['course'] = $course->getLastQuery();
        return view('admin/courses');     
    }
    public function insert()
    {
       helper(['form', 'url']);
       $file = $this->request->getFile('photo');
       if($file->isValid() && !$file->hasMoved())
       {
       		$imageName = $file->getRandomName();
       		$file->move('public/upload', $imageName);
       }

        $database = \Config\Database::connect();
        // $db = $database->table('courses');

        $validation = \config\Services::validation();
        $check = $this->validate([
            'heading'=>'required',
            'info'=>'required',
        ]);
        if(!$check)
        {
	            return view('admin/courses', ['validation'=>$this->validator]);     
        }
        else
        {       
            $model = new CoursewebModel();
          
            $data = [
                        'heading' =>$this->request->getVar('heading'),
                        'info' =>$this->request->getVar('info'),
                        'photo' =>$imageName,
                   ];
        
            $model->insert($data);
         
            return view('admin/courses');
        }
        return view('admin/courses');
    } 
    
    public function save()
    {
       helper(['form', 'url']);
       $file = $this->request->getFile('photo');
       if($file->isValid() && !$file->hasMoved())
       {
            $imageName = $file->getRandomName();
            $file->move('public/upload', $imageName);
       }

        $database = \Config\Database::connect();
        // $db = $database->table('courses');

        $validation = \config\Services::validation();
        $check = $this->validate([
            'heading'=>'required',
            'info'=>'required',
        ]);
        if(!$check)
        {
                return view('admin/courses', ['validation'=>$this->validator]);     
        }
        else
        {       
            $models = new CourseandroidModel();
            $data = [
                        'heading' =>$this->request->getVar('heading'),
                        'info' =>$this->request->getVar('info'),
                        'photo' =>$imageName,
                   ];
        
           
            $models->insert($data);
            return view('admin/courses');
        }
        return view('admin/courses');
    }

    public function inserts()
    {
       helper(['form', 'url']);
       $file = $this->request->getFile('photo');
       if($file->isValid() && !$file->hasMoved())
       {
            $imageName = $file->getRandomName();
            $file->move('public/upload', $imageName);
       }

        $database = \Config\Database::connect();
        // $db = $database->table('courses');

        $validation = \config\Services::validation();
        $check = $this->validate([
            'heading'=>'required',
            'info'=>'required',
        ]);
        if(!$check)
        {
                return view('admin/courses', ['validation'=>$this->validator]);     
        }
        else
        {       
            $model = new CoursemobileModel();
          
            $data = [
                        'heading' =>$this->request->getVar('heading'),
                        'info' =>$this->request->getVar('info'),
                        'photo' =>$imageName,
                   ];
        
            $model->insert($data);
         
            return view('admin/courses');
        }
        return view('admin/courses');
    }  
    public function edit()
    {
    	// $model = new DetailModel();
    	// $data['edit'] = $model->find($id);
        return view('admin/edit');     
    }
}