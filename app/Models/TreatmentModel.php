<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentModel extends Model
{
    use HasFactory;
    protected $table = 'treatments';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
