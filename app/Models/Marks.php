<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;


class Marks extends Model
{

    use HasFactory;
    protected $guard = 'marks';

    protected $fillable = ['RegistrationNumber', 'SubjectCode', 'ESE','CA'];
}
