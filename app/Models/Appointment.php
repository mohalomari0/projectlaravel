<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Allow mass assignment for these fields
    protected $fillable = ['name', 'email', 'phone', 'service_id', 'date', 'time'];

public function service()
{
    return $this->belongsTo(Service::class);
}
}
