<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use View;
use App\Models\Student;
use App\Models\Lecturer;
use Auth;

class MailController extends Controller
{
    public function studentMail(Request $request){

        $indexNumber= Auth::user()->IndexNumber;

        $request->validate([
            'subject' => 'required',
            'contentMessage'=>'required'
        ]);

        $msg=' Index Number:'.$indexNumber.'  ';
        $msg .= ' subject: '. $request->subject.'  ';
        $msg .= ' message : ' . $request->contentMessage;

        Mail::send('blank', array('msg'=>$msg), function($message)  {
            $message->to('95sanchayan@gmail.com')
                ->subject("Student Inquiry");
        });


        return back()->with(['message' => 'Email successfully sent!']);


    }
    public function sendEmailLecturer(Request $request){

        $name= Auth::user()->Name;
        $request->validate([
            'subject' => 'required',
            'inquiryMessage' => 'required',
        ]);

        $msg ='Lecturer Name:'.$name;
        $msg .= ' subject: '. $request->subject;
        $msg .= ' message : ' . $request->inquiryMessage;


        Mail::send('blank', array('msg'=>$msg), function($message)  {
            $message->to('95sanchayan@gmail.com')
                ->subject("Lecturer Inquiry");
        });


        return back()->with(['message' => 'Email successfully sent!']);    }

    public  function sendInquiryLecturer(){
        return View::make('Lecturer.email');
    }
    public function create()
    {
        return View::make('email');
    }
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'name' => 'required',
        ]);

        $data = [
            'subject' => $request->subject,
            'name' => $request->name,
            'email' => $request->email,
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);

    }

    public function SendStudentCredentials(Request $request)
    {

        $students=Student::select('*')->get();

        foreach ($students as $student)
        {
//            dd($student->email);

            $email=$student->email;
            $msg =  'Your Login details:';
            $msg .= ' email: '. $student->email;
            $msg .= ' Password : ' . $student->NIC_Number;


            Mail::send('blank', array('msg'=>$msg), function($message) use ($email) {
                $message->to($email)
                    ->subject("Login Details");
            });

        }

        return back()->with(['message' => 'Email successfully sent!']);

    }

    public function SendLecturerCredentials(Request $request)
    {

        $students=Lecturer::select('*')->get();

        foreach ($students as $student)
        {
//            dd($student->email);

            $email=$student->email;
            $msg =  'Your Login details:';
            $msg .= ' email: '. $student->email;
            $msg .= ' Password : ' . $student->NIC_Number;


            Mail::send('blank', array('msg'=>$msg), function($message) use ($email) {
                $message->to($email)
                    ->subject("Login Details");
            });

        }

        return back()->with(['message' => 'Email successfully sent!']);

    }
}
