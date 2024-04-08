<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;

use Domain\Facades\StudentFacade;

use Illuminate\Http\Request;

class StudentController extends ParentController
{


    public function index()
    {
        $response['students'] = StudentFacade::all();
        return view('pages.student.index')->with($response);
    }

    public function store(Request $request)
    {
        StudentFacade::store($request->all());

        return redirect()->back();
    }

    public function delete($student_id)
    {

        StudentFacade::delete($student_id);
        return redirect()->back();
    }

    public function done($student_id)
    {

        StudentFacade::done($student_id);
        return redirect()->back();
    }
}
