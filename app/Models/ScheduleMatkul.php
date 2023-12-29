<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleMatkul extends Model
{
    use HasFactory;

    protected $table = 'schedule_matkul';

    protected $fillable = [
        'schedule_id',
        'matkul_id'
    ];

    function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(
            ScheduleMatkul::class,
            'schedule_matkul_class',
            'schedule_matkul_id',
            'class_id');
    }

}
