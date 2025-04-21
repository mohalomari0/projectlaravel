<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
    ];

    // العلاقة مع المواعيد (Appointments)
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}


