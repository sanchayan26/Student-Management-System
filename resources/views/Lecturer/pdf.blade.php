<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12" style="margin-top: 15px ">
            <div class="pull-left">
                <h2>Report</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/lecturer/downloadPdf">Download PDF</a>
            </div>
        </div>
    </div><br>

    <table class="table table-bordered">
        <tr>
            <th>Registration Number</th>
            <th>Subject Code</th>
            <th>End Semester Marks</th>
            <th>Continious Assesment Marks</th>
        </tr>

        @foreach ($user as $user)
        <tr>
            <td>{{ $user->RegistrationNumber }}</td>
            <td>{{ $user->SubjectCode }}</td>
            <td>{{ $user->ESE }}</td>
            <td>{{ $user->CA }}</td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
