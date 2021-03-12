<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\EnrollStudent;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Department;

use Illuminate\Http\Request;
use View;
use DB;


class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteStudent($id){
        $deletedRows = Student::where('RegistrationNumber', $id)->delete();

        return back()->with(['message'=>'Successfully Removed Student']);





    }
   public function storeSubjects(Request $request){
        $subjects = $request->subject;
        $semester=$request->Semester;

        foreach ($subjects as $subject) {

            $validation = Subject::select('*')->where('SubjectCode', $subject)->where('SemesterNumber', $semester)->first();
            if (isset($validation)) {

                $courseEnroll = new EnrollStudent;
                $courseEnroll->SubjectCode = $subject;
                $courseEnroll->RegistrationNumber = $request->RegistrationNumber;
                $courseEnroll->Semester = $request->Semester;
                $courseEnroll->save();
                return redirect('/admin/yly_viewStudent')->with(['message' => 'Subjects Enrolled']);

            } else {
                return redirect('/admin/yly_viewStudent')->with(['message' => 'Failed!! Check is subject assigned selected Semester ']);


            }

        }


    }

    public function enrollLecturer($id)
    {
        $lecturerID=$id;
        $lecturer = Lecturer::select('*')->where('LectID',$lecturerID)->get();
        $deptNO=$lecturer[0]->DeptNO;
        $subjects = Subject::select('*')->where('DeptNO',$deptNO)->get();

        return View::make('Admin.enrollLecturer', ['lecturer' => $lecturer,'subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeAssignedSubject(Request $request)
    {

        if(Enroll::select('*')->where('LectID',$request->LectID)
            ->where('SubjectCode',$request->subject)->doesntExist())
        {
            $assignedSubject = new Enroll();
            $assignedSubject->LectID = $request->LectID;
            $assignedSubject->SubjectCode = $request->subject;
            $assignedSubject->save();

            return redirect('/admin/yly_viewLectures')->with(['message' => ' successfully Subject Assigned!']);

        }
        else{
            return back()->with(['message'=>'Already this subject Assigned to this lecturer ']);
        }



    }

    public function storeAssignedDepartment(Request $request)
    {
        $id=$request->RegistrationNumber;
//        $assignedDepartment = Student::where('RegistrationNumber',$id)->get();
        $deptNO= $request->department;
        DB::table('students')
            ->where('RegistrationNumber', $id)
            ->update(['DeptNO' =>$deptNO ]);

        return redirect('/admin/yly_viewStudent')->with(['message'=>'Department Assigned']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewLecturerEnrollments()
    {
        $lecturers = Lecturer::select('*')
            ->join('assignsubjects','assignsubjects.LectID','=','lecturers.LectID')
            ->paginate(5);

        return View::make('Admin.viewLecturersEnrollments', ['lecturers' => $lecturers]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function enrollstudentdepartment($id)
    {

        $student=Student::select('*')->where('RegistrationNumber',$id)->get();
        return View::make('Admin.enrollStudentdepartment', ['student' => $student]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */


    public function enrollCourse( $id)
    {

        $student=Student::select('*')->where('RegistrationNumber',$id)->get();
        $subjects=Subject::select('*')->where('DeptNO',$student[0]->DeptNO)->get();
        return View::make('Admin.enrollStudentCourse', ['student' => $student,'subjects'=>$subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enroll $enroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enroll $enroll)
    {
        //
    }
}
