<?php
$id='';
$RegistrationNumber='';
$SubjectCode='';
$ESE='';
$CA='';

if (isset($data[0]))
{
    $id=$data[0]->id;
    $RegistrationNumber = $data[0]->RegistrationNumber;
    $SubjectCode = $data[0]->SubjectCode;
    $ESE = $data[0]->ESE;
    $CA = $data[0]->CA;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #000;
            background-image: url("background.jpg");
            font-family: "Roboto", sans-serif;
        }
        .contact-form {
            padding: 10px;
            margin: 10px auto;
        }
        .contact-form h1 {
            font-size: 42px;
            /*font-family: 'Pacifico', sans-serif;*/
            margin: 0 0 50px;
            text-align: center;
        }
        .contact-form .form-group {
            margin-bottom: 20px;
        }
        .contact-form .form-control, .contact-form .btn {
            min-height: 40px;
            border-radius: 2px;
        }
        .contact-form .form-control {
            border-color: #e2c705;
        }
        .contact-form .form-control:focus {
            border-color: #d8b012;
            box-shadow: 0 0 8px #dcae10;
        }
        .contact-form .btn-primary, .contact-form .btn-primary:active {
            min-width: 250px;
            color: #fcda2e;
            background: #000 !important;
            margin-top: 20px;
            border: none;
        }
        .contact-form .btn-primary:hover {
            color: #fff;
        }
        .contact-form .btn-primary i {
            margin-right: 5px;
        }
        .contact-form label {
            opacity: 0.9;
        }
        .contact-form textarea {
            resize: vertical;
        }
        .bs-example {
            margin: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Main</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/lecturer">Lecturer Home <span class="sr-only">(current)</span></a>
            </li>

            <a href="{{ url()->previous() }}"  style="color: red; position: absolute; right: 20px;"> Back  </a>

        </ul>

    </div>
</nav>
<div class="container-lg">
    <div class="row" style="color: #50c878; ">
        <div class="col-md-8 mx-auto">
            <div class="contact-form" style="margin-top: 0px;">
                @if(isset($editLecturer))
                <h1>Update Lecturer</h1>
                @else
                <h1>Insert Student Marks</h1>
                @endif

                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <form  action="/lecturer/updateMarks" method="post">
                    @csrf

                    <div>
                    <x-input id="id" class="form-control" type="hidden" name="id"  required autofocus  value="{{$id}}"/>
                    <!-- Lecturer ID -->

                        <div class="row">
                            <div class="col-sm-6">
                                <x-label for="LectID" :value="__('Registration Number')" />

                                <x-input id="RegistrationNumber" class="form-control" type="text" name="RegistrationNumber"  required autofocus  value="{{$RegistrationNumber}}"/>
                            </div>

                            <div class="col-sm-6">
                                <x-label for="Lecturer Name" :value="__('Subject Code')" />

                                <x-input id="SubjectCode" class="form-control" type="text" name="SubjectCode"  required autofocus value="{{$SubjectCode}}"/>
                            </div>

                        </div>

                        <div class="row">

                            <!--Lecturer Email -->
                            <div class="col-sm-6">
                                <x-label for="ESE Marks" :value="__('ESE Marks')" />

                                <x-input id="ESE" class="form-control" type="text" name="ESE" required value="{{$ESE}}"/>
                            </div>

                            <!--Lecturer NIC -->
                            <div class="col-sm-6">
                                <x-label for="CA Marks" :value="__('CA Marks')" />

                                <x-input id="CA" class="form-control" type="text" name="CA"  required autofocus value="{{$CA}}"/>
                            </div>



                        </div>







                    <div class="text-center">
                        @if(isset($editLecturer))
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update</button>
                        @else
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<div style=" position: absolute; right: 600px;">
    You are logged in as

    <a href="" style="color: #50c878"> {{ Auth::user()->Name }}</a>

</div>
</html>
