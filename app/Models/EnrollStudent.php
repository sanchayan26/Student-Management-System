<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EnrollStudent extends Model
{
    use LogsActivity;
    protected static $logFillable = true;

    use HasFactory;
    protected $table='enroll';
}
