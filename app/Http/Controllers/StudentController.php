<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\EnrollStudent;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Marks;
use Illuminate\Http\Request;
use View;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function selectSemester(){
        $studentID = Auth::user()->RegistrationNumber;


        $semesters= EnrollStudent::select('semester')
            ->where('RegistrationNumber',$studentID)
            ->distinct()
            ->get();
        return View::make('student.selectSemester',['semesters'=>$semesters]);
    }

    public function viewGPA(Request $request){
        $studentID = Auth::user()->RegistrationNumber;
        $semester=$request->semester;
        $subjects=EnrollStudent::select('*')
            ->where('semester',$semester)
            ->where('RegistrationNumber',$studentID)
            ->JOIN('subjects','subjects.SubjectCode','=','enroll.SubjectCode')
            ->get();

        return View::make('student.viewGPA',['subjects'=>$subjects]);

    }
    public function viewMarks()
    {
        $studentID = Auth::user()->RegistrationNumber;
        $results= Marks::select('*')->where('RegistrationNumber',$studentID)->paginate(10);
        return View::make('student.viewMarks',['results'=>$results]);
    }
    public function editSubject($id){

        $editStudent=Subject::select('*')->where('id',$id)->first();
        return View::make('Admin.createSubject', ['editStudent' => $editStudent]);

    }
    public function viewSubjects(){
        $studentID = Auth::user()->RegistrationNumber;
        $subjects=EnrollStudent::select('*')
            ->where('RegistrationNumber',$studentID)
            ->leftjoin('subjects','enroll.SubjectCode','=','subjects.SubjectCode')
            ->paginate(8);

        return View::make('student.viewSubjects',['subjects'=>$subjects]);


    }
    public function editStudent($id)
    {
        $editStudent=Student::select('*')->where('RegistrationNumber',$id)->first();
        return View::make('Admin.addStudent', ['editStudent' => $editStudent]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
