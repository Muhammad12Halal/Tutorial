<?php

namespace App\Repository;

use App\Interface\StudentInterface;
use App\Models\Student;

class StudentRepository implements StudentInterface
{
    protected $student = null;

    public function getAllStudent()
    {
        return Student::get();
    }

    public function indexAPI($collection = [])
    {
        if($collection['keyword'] != ''){
            return Student::where('name','LIKE','%'.$collection['keyword'].'%')->get();
        }else{
            return Student::get();
        }
    }

    public function createStudent()
    {

    }

    public function storeStudent($request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->student_ID = $request->student_ID;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();
        return $student;
    }

    public function getStudentById($id)
    {
        return Student::find($id);
    }

    public function editStudent($id)
    {
        return Student::find($id);
    }

    public function updateStudent($id, $request)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->student_ID = $request->student_ID;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();
        return $student;
    }

    public function deleteStudent($id)
    {
        return Student::find($id)->delete();
    }
}
