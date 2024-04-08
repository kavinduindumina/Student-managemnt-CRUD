<?php

namespace domain\Services;

use App\Models\Student;

class StudentService
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function all()   
    {
        return $this->student->all();
    }

    public function store($data)
    {
        $this->student->create($data);

    }

    public function delete($student_id)
    {

        $student = $this->student->find($student_id);
        $student->delete();
    }

    public function done($student_id)
    {

        $student = $this->student->find($student_id);
        $student->done =1;
        $student->update();
    }
}
