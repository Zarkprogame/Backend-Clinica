<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAppointmentModel extends Model
{
    use HasFactory;
    protected $table = 'medical_appointments';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
