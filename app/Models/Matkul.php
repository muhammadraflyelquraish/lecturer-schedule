<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    protected $fillable = ['code', 'name', 'semester'];

    protected $casts = [
        'semester' => 'integer',
    ];
    
    public function schedules(): BelongsToMany
    {
        return $this->belongsToMany(
            Matkul::class,
            'schedule_matkul',
            'matkul_id',
            'schedule_id');
    }
}
