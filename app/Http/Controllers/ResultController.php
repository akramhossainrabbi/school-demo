<?php

namespace App\Http\Controllers;

use App\Result;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $students = Student::with('results')->get();
        return view('result', compact('students'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('add-result', compact('subjects', 'students'));
    }

    public function save(Request $request)
    {
        if (Result::where('student_id', '=', $request->student)->exists()) {
            return back()->with([
                'error' => 'This student result already exists in database'
            ]);;
         }
         
        $subjects = $request->input('subject');
        $result = $request->input('result');
        foreach($subjects as $key=>$value){
            $result_modal = new Result;
            $result_modal->student_id = $request->student;
            $result_modal->subj_id = $value;
            $result_modal->mark = $result[$key];
            if ($result[$key] < 32) {
                $result_modal->gpa = 0;
            } elseif ($result[$key] >= 33 && $result[$key] <= 39) {
                $result_modal->gpa = 1;
            } elseif ($result[$key] >= 40 && $result[$key] <= 49) {
                $result_modal->gpa = 2;
            } elseif ($result[$key] >= 50 && $result[$key] <= 59) {
                $result_modal->gpa = 3;
            } elseif ($result[$key] >= 60 && $result[$key] <= 69) {
                $result_modal->gpa = 3.5;
            } elseif ($result[$key] >= 70 && $result[$key] <= 79) {
                $result_modal->gpa = 4;
            } elseif ($result[$key] >= 80 && $result[$key] <= 100) {
                $result_modal->gpa = 5;
            } 

            $result_modal->save();

        }

        return back()->with([
            'success' => 'New result has been created successfully'
        ]);;
    }
}
