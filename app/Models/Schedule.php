<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $fillable = [
        'user_id', 'tahun_akademik'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matkuls(): HasMany
    {
        return $this->hasMany(ScheduleMatkul::class, 'schedule_id', 'id');
    }
}
