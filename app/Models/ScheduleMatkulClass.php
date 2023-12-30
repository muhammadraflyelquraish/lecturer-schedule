<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleMatkulClass extends Model
{
    use HasFactory;

    protected $table = 'schedule_matkul_class';

    protected $fillable = [
        'schedule_matkul_id',
        'class_id',
        'sks',
        'hari',
        'jam',
        'ruangan'
    ];

    public function class ()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
