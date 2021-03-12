<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Authenticatable
{
    protected $guarded='student';
    use LogsActivity;

    protected $fillable = [
        'email', 'password','FirstName','LastName','MiddleName','Address','IndexNumber',
        'RegistrationNumber','NIC_Number','Title','DeptNO'
    ];

    protected static $logFillable = true;
}
