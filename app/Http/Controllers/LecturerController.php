<?php

namespace App\Http\Controllers;

use App\Models\EnrollStudent;
use App\Models\Lecturer;
use App\Models\Enroll;
use App\Models\Student;
use App\Models\Marks;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use View;
use PDF;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function deleteEnrollment($id){

        $editEnrollment=Enroll::select('*')->where('id',$id)->delete();

        return back()->with(['message'=>'Successfully Removed Lecturer From Assigned Subject']);

    }


    public function selectSubject(){
        $lectID = Auth::user()->LectID;
        $subjects=Enroll::select('*')
            ->where('assignSubjects.LectID',$lectID)
            ->leftjoin('subjects','assignSubjects.SubjectCode','=','subjects.SubjectCode')
            ->get();

        return View::make('Lecturer.selectSubject',['subjects'=>$subjects]);




    }

    public function downloadPdf(){
        $lectID = Auth::user()->LectID;
        $user = Marks::select('*')->where('Lecturer',$lectID)->paginate(5);
        $pdf = PDF::loadView('Lecturer.pdf',compact('user'));
        return $pdf->download('pdfview.pdf');

    }
  public function makeReport(Request $request)
{
    $lectID = Auth::user()->LectID;
    $subject=$request->subject;
    $user = Marks::select('*')->where('Lecturer',$lectID)->where('SubjectCode',$subject)->paginate(10);

    return View::make('Lecturer.pdf',['user'=>$user]);

}

    public function deleteMarks($id){

        $deletedRows = Marks::where('id', $id)->delete();

        return back()->with(['message'=>'Deleted Successfully']);

    }
    public  function addMarksSingle()
    {
        return View::make('Lecturer.editMarks');
    }
    public function updateMarks(Request $request){

        $id=$request->id;
        $lectID = Auth::user()->LectID;

        if($id =='' || $id== null){

            $validateStudent=EnrollStudent::where('SubjectCode',$request->SubjectCode)
                ->where('RegistrationNumber',$request->RegistrationNumber)->get()->first();
            $validateLecturer=Enroll::where('LectID',$lectID)
                ->where('SubjectCode',$request->SubjectCode)->get()->first();

            $validateAllreadyIn=Marks::where('SubjectCode',$request->SubjectCode)->
                where('RegistrationNumber',$request->RegistrationNumber)->get()->first();
            if(isset($validateStudent) and isset($validateLecturer) and ! isset($validateAllreadyIn)){
                $mark= new Marks();
                $mark->RegistrationNumber=$request->RegistrationNumber;
                $mark->SubjectCode=$request->SubjectCode;
                $mark->ESE=$request->ESE;
                $mark->CA=$request->CA;
                $mark->Lecturer=$lectID;
                $mark-> save();
                return back()->with(['message'=>'Marks are Updated']);

            }else{
                return back()->with(['message'=>'failed!! check the data again']);

            }


        }else{
            $marks=Marks::where('id',$id)
                ->where('Lecturer',$lectID)
                ->update(array(
                    'RegistrationNumber'=>$request->RegistrationNumber,
                    'SubjectCode'=>$request->SubjectCode,
                    'ESE'=>$request->ESE,
                    'CA'=>$request->CA
                ));
            return redirect('/lecturer');

        }




    }

    public function editMarks($id){
        $data=Marks::select('*')->where('id',$id)->get();
        return View::make('Lecturer.editMarks',['data'=>$data]);
    }

    public function viewStudentMarks(){
        $lectID = Auth::user()->LectID;
        $marks=Marks::select('*')->where('Lecturer',$lectID)->paginate(5);
        return View::make('Lecturer.viewMarks',['marks'=> $marks]);

    }

    public function enrollMarks(){
        $lectID = Auth::user()->LectID;
        if (($handle = fopen ( public_path () . '/enrollMarks.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

                $subject=$data[1];
                $student=$data[0];
                $checkEnrollment=EnrollStudent::where('RegistrationNumber',$student)->where('SubjectCode',$subject)->get();
                if ($checkEnrollment != null)
                {
                    $marks = new Marks;

                    $marks->RegistrationNumber = $data[0];
                    $marks->SubjectCode = $data[1];
                    $marks->ESE = $data[2];
                    $marks->CA = $data[3];
                    $marks->Lecturer = $lectID;

                    $marks->save();
                }

            }
            fclose ( $handle );
        }
        return redirect('/lecturer');


    }
    public function viewStudent(){
        $lectID = Auth::user()->LectID;
        $subjects=Enroll::select('*')->where('LectID',$lectID)->paginate(10);

        return View::make('Lecturer.viewStudents', ['subjects' => $subjects]);

    }

    public function editLecturer($id)
    {
        $editLecturer=Lecturer::select('*')->where('LectID',$id)->first();
        return View::make('Admin.createLecturer', ['editLecturer' => $editLecturer]);
    }

    public function deleteLecturer($id){

        $checkDelete=Enroll::select('*')->where('LectID',$id)->first();

        if (isset($checkDelete))
        {
            return back()->with(['message'=>"You Can Not delete as Lecturer assigned to the subject. to delete remove assigned subject"]);
        }
        else{
            $deletedRows = Lecturer::where('LectID', $id)->delete();

            return back()->with(['message'=>'successfully Removed']);
        }

    }

    public function viewSubjects()
    {

        $lectID = Auth::user()->LectID;

        $subjects = Enroll::select('*')
            ->join('subjects','subjects.subjectCode','=','assignsubjects.subjectCode')
            ->where('assignsubjects.LectID','=',$lectID)
            ->paginate(5);

        return View::make('Lecturer.viewSubjects', ['subjects' => $subjects]);
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
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
