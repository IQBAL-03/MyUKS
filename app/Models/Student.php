<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'nis',
        'nama',
        'kelas_id',
        'jenis_kelamin'
    ];

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
