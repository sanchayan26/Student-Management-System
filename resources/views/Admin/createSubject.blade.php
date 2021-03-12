<?php
$SubjectCode = '';
$SubjectName = '';
$NumberOfCredits = '';
$Category = '';
$SemesterNumber = '';
$ContributionOfGPA = '';
$DeptNO = '';
$id='';

if (isset($editStudent)) {

    $SubjectCode = $editStudent->SubjectCode;
    $SubjectName = $editStudent->SubjectName;
    $NumberOfCredits = $editStudent->NumberOfCredits;
    $Category = $editStudent->Category;
    $SemesterNumber = $editStudent->SemesterNumber;
    $ContributionOfGPA = $editStudent->Address;
    $DeptNO = $editStudent->DeptNO;
    $id=$editStudent->id;


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
                <a class="nav-link" href="/admin">Admin Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a style="color: #50c878" class="nav-link" href="/subjects-import-form"> Register Subjects(bulk) </a>
            </li>


            <li style="position: absolute; right: 20px; color: red;">
                <a href="/admin"> Back To Main </a>
            </li>

        </ul>

    </div>
</nav>
<div class="container-lg">
    <div class="row" style="color: #50c878; ">
        <div class="col-md-8 mx-auto">
            <div class="contact-form" style="margin-top: 0px;">
                @if(isset($editStudent))
                <h1>Update Subject</h1>
                @else
                <h1 style="color: black;">Add Subject</h1>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <form action="/dashboard/addSubject" method="post">
                    @csrf
                    <x-input id="id" class="form-control" type="hidden" name="id"  required autofocus  value="{{$id}}"/>

                    <div class="row">
                        <!-- Subject Code -->
                        <div class="col-sm-6">
                            <x-label for="SubjectCode" :value="__('Subject Code')" />

                            <input id="SubjectCode" class="form-control" type="text" placeholder="Enter Subject Code" name="SubjectCode"  required autofocus value="{{$SubjectCode}}" />
                            @error('SubjectCode')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>


                        <!--Subject Name -->
                        <div class="col-sm-6">
                            <x-label for="SubjectName " :value="__('Subject Name')" />

                            <input id="SubjectName" class="form-control" type="text" placeholder="Enter Subject Name" name="SubjectName"  required autofocus value="{{$SubjectName}}"/>
                        </div>
                    </div>

                    <div class="row">

                        <!--Number Of Credits  -->
                        <div class="col-sm-6">
                            <x-label for="NumberOfCredits " :value="__('Number Of Credits')" />

                            <input id="NumberOfCredits" class="form-control" type="text" placeholder="Number Of Credits" name="NumberOfCredits"  required autofocus value="{{$NumberOfCredits}}" />
                        </div>

                        <!--Category  -->
                        <div class="col-sm-6">
                            <x-label for="Category " :value="__('Category ')" />

                            <select id="Category" name="Category" class="form-control"  value="{{$Category}}" required>
                                <option value=""> Select Subject Type</option>
                                <option value="compulsory">compulsory</option>
                                <option value="elective">elective</option>
                                <option value="optional">optional</option>
                            </select>

                            <!--                                    <x-input id="Category" class="block mt-1 w-full" type="text" name="Category" :value="old('Category')" required autofocus />-->
                        </div>
                    </div>

                    <div class="row">
                        <!--Semester Number-->
                        <div class="col-sm-6">
                            <x-label for="SemesterNumber " :value="__('Semester Number')" />

                            <input id="SemesterNumber" class="form-control" placeholder="Semester Number" type="text" name="SemesterNumber"  required autofocus value="{{$SemesterNumber}}" />
                        </div>

                        <!--ContributionOfGPA  -->
                        <div class="col-sm-6">
                            <x-label for="ContributionOfGPA " :value="__('Contribution Of GPA')" />

                            <select id="ContributionOfGPA" name="ContributionOfGPA" class="form-control" value="{{$ContributionOfGPA}}" required>
                                <option value="">Is Contributed to GPA</option>
                                <option value="1">Yes</option>
                                <option value="0">NO</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <!--DeptNO -->
                        <div class="col-sm-12">
                            <x-label for="DeptNO " :value="__('Department ')" />

                            <select id="DeptNO" name="DeptNO" class="form-control" value="{{$DeptNO}}" required>
                                <option value="">select Department</option>
                                <option value="1">Electronics</option>
                                <option value="2">Statistics</option>
                                <option value="3">Mathematics</option>
                                <option value="4">Computer science</option>
                                <option value="5">Industrial Management </option>
                            </select>

                        </div>


                    </div>

                    <div class="text-center">
                        @if(isset($editStudent))
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

    <a href="" style="color: #50c878"> {{ Auth::user()->name }}</a>

</div>
</html>
