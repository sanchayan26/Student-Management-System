<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use View;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeSubjectBulk(){
        if (($handle = fopen ( public_path () . '/subject.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

                $user = Subject::where('SubjectCode', '=', $data[0])->first();
                if ($user === null) {
                    $subject = new Subject;

                    $subject->SubjectCode =$data[0];
                    $subject->SubjectName = $data[1];
                    $subject->NumberOfCredits = $data[2];
                    $subject->Category =$data[3];
                    $subject->SemesterNumber = $data[4];
                    $subject->ContributionOfGPA = $data[5];
                    $subject->DeptNO = $data[6];
                    $subject->save();
                }

            }
            fclose ( $handle );
        }
        return redirect('/admin');

    }

    public function importSubjects(){
        return View::make('Admin.importFormSubjects');
    }

    public function storeSubjectCsv(Request $request){
        $adminId = Auth::user()->name;
        $file=$request->file;
        if (($handle = fopen ( $file, 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

                $user = Subject::where('SubjectCode', '=', $data[0])->first();
                if ($user === null) {
                    $subject = new Subject;

                    $subject->SubjectCode =$data[0];
                    $subject->SubjectName = $data[1];
                    $subject->NumberOfCredits = $data[2];
                    $subject->Category =$data[3];
                    $subject->SemesterNumber = $data[4];
                    $subject->ContributionOfGPA = $data[5];
                    $subject->DeptNO = $data[6];
                    $subject->save();
                }



            }
            fclose ( $handle );
        }
        return redirect('/admin')->with(['message'=>'successfully Subjects Added']);
    }
    public function storeBulkLecturer(){
        if (($handle = fopen ( public_path () . '/lecturer.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

                $user = Lecturer::where('LectID', '=', $data[0])->first();
                if ($user === null) {
                    $lecturer = new Lecturer;

                    $lecturer->LectID = $data[0];
                    $lecturer->Name = $data[1];
                    $lecturer->email = $data[3];
                    $lecturer->NIC_Number = $data[2];
                    $lecturer->password = Hash::make($data[2]);
                    $lecturer->DeptNO =$data[5];
                    $lecturer->save();
                }

            }
            fclose ( $handle );
        }
        return redirect('/admin');

    }




    public function importFormLecturer(){
        return View::make('Admin.import-formLecturer');
    }
    public function importForm(){
        return View::make('import-form');
    }


    public function LecturerBulk(Request $request)
    {
        $adminId = Auth::user()->name;
        $file=$request->file;
        if (($handle = fopen ( $file, 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

                $user = Lecturer::where('LectID', '=', $data[0])->first();
                if ($user === null) {
                    $lecturer = new Lecturer;

                    $lecturer->LectID = $data[0];
                    $lecturer->Name = $data[1];
                    $lecturer->email = $data[3];
                    $lecturer->NIC_Number = $data[2];
                    $lecturer->password = Hash::make($data[2]);
                    $lecturer->DeptNO =$data[5];
                    $lecturer->save();
                }


            }
            fclose ( $handle );
        }
        return redirect('/admin')->with(['message'=>'successfully inserted']);
    }

    public function StudentBulk(Request $request){
        $adminId = Auth::user()->name;
        $file=$request->file;
        if (($handle = fopen ( $file, 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

                $user = Student::where('RegistrationNumber', '=', $data[0])->first();
                if ($user === null) {
                    $student = new Student();
                    $student->RegistrationNumber = $data[0];
                    $student->IndexNumber = $data[1];
                    $student->FirstName = $data[2];
                    $student->LastName = $data[3];
                    $student->MiddleName = $data[4];
                    $student->Address =$data[5];
                    $student->NIC_Number = $data[6];
                    $student->DeptNO="000";
                    $student->email = $data[7];
                    $student->password= Hash::make($data[6]);
                    $student->save();
                }


            }
            fclose ( $handle );
        }
        return redirect('/admin')->with(['message'=>'successfully inserted']);

    }



    public function viewStudent()
    {
        $students = Student::select('*')->paginate( 5 );
        return View::make('Admin.viewStudent', ['community' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStudent(){
        return View::make('Admin.addStudent');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudent(Request $request){
        $adminId = Auth::user()->name;

        $id=$request->id;
        $registrationNumber=$request->RegistrationNumber;


        if ($id == null || $id == '') {

            $student = new Student();

            $student->RegistrationNumber = $request->RegistrationNumber;
            $student->IndexNumber = $request->IndexNumber;
            $student->FirstName = $request->FirstName;
            $student->LastName = $request->LastName;
            $student->MiddleName = $request->MiddleName;
            $student->Address = $request->Address;
            $student->NIC_Number = $request->NIC_Number;
            $student->DeptNO = "000";
            $student->email = $request->email;
            $student->password = Hash::make($request->NIC_Number);
            $student->save();
            return back()->with(['message' => ' successfully Registered!']);

        }
        else{
            $student = Student::where('RegistrationNumber', $registrationNumber)
                ->update(array(
                    'IndexNumber' =>$request->IndexNumber,
                    'FirstName' =>  $request->FirstName,
                    'LastName' =>$request->LastName,
                    'MiddleName' => $request->MiddleName,
                    'NIC_Number' => $request->NIC_Number,
                    'email' => $request->email,

                ));
            return back()->with(['message' => ' successfully Updated!']);



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function createSubject()
    {
        return View::make('Admin.createSubject');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function storeSubject(Request $request)
    {
        $adminId = Auth::user()->name;
        $id=$request->id;

        if ($id == null || $id == '') {


            $subject = new Subject;

            $subject->SubjectCode = $request->SubjectCode;
            $subject->SubjectName = $request->SubjectName;
            $subject->NumberOfCredits = $request->NumberOfCredits;
            $subject->Category = $request->Category;
            $subject->SemesterNumber = $request->SemesterNumber;
            $subject->ContributionOfGPA = $request->ContributionOfGPA;
            $subject->DeptNO = $request->DeptNO;
            $subject->save();
            return back()->with(['message' => ' successfully Added!']);
        }
        else
            {
                $subject = Subject::where('id', $id)
                    ->update(array(
                        'SubjectCode' =>$request->SubjectCode,
                        'SubjectName' =>  $request->SubjectName,
                        'NumberOfCredits' =>$request->NumberOfCredits,
                        'Category' => $request->Category,
                        'SemesterNumber' => $request->SemesterNumber,
                        'ContributionOfGPA' => $request->ContributionOfGPA,
                        'DeptNO' =>$request-> DeptNO,

                    ));
                return back()->with(['message' => ' successfully Updated!']);
            }
        }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function createLecturer()
    {
        return View::make('Admin.createLecturer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function storeLecturer(Request $request)
    {
        $id=$request->id;
        $LectID=$request->LectID;
        $adminId = Auth::user()->name;



        if ($id == null || $id == '') {

            $lecturer = new Lecturer;

            $lecturer->LectID = $request->LectID;
            $lecturer->Name = $request->Name;
            $lecturer->email = $request->email;
            $lecturer->NIC_Number = $request->NIC_Number;
            $lecturer->password = Hash::make($request->NIC_Number);
            $lecturer->DeptNO = $request->DeptNO;
            $lecturer->save();
            return back()->with(['message' => ' successfully Created!']);

        }
        else{
            $lecturer = Lecturer::where('LectID', $LectID)
                ->update(array('LectID' => $request->LectID,
                    'Name' =>$request->Name,
                    'DeptNO'=>$request->DeptNO,
                    'NIC_Number' => $request->NIC_Number,
                    'email' => $request->email,

                ));
            return redirect('/admin')->with(['message' => ' successfully Updated!']);

        }
    }

    public function viewLecturer()
    {
        $lecturers = Lecturer::select('*')
            ->leftjoin('departments','departments.DeptNO','=','lecturers.DeptNO')
            ->paginate(5);

        return View::make('Admin.viewLecturers', ['lecturers' => $lecturers]);
    }

    public function viewSubjects()
    {
        $subjects = Subject::select('*')
            ->paginate(10);

        return View::make('Admin.viewSubjects', ['subjects' => $subjects]);
    }


}
