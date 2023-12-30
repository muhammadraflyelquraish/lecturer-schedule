<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $fillable = ['name', 'angkatan'];

    public function scheduleMatkuls()
    {
        return $this->belongsToMany(
            ScheduleMatkul::class,
            'schedule_matkul_class',
            'class_id',
            'schedule_matkul_id',
        );
    }
}
