<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student', compact('students'));
    }

    public function create(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
        ]);

        if ($student) {
            return redirect()
                ->route('student.index')
                ->with([
                    'success' => 'New student has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
