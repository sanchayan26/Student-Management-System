<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Lecturer extends Authenticatable
{
    protected $guard = 'lecturer';
    protected static $logFillable = true;


    use LogsActivity;

    protected $fillable = ['LectID', 'Name', 'NIC_Number','DeptNO'];

}
