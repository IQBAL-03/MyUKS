<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'keluhan',
        'diagnosa',
        'tanggal_kunjungan'
    ];
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public function medicines(): BelongsToMany
    {
        return $this->belongsToMany(Medicine::class, 'treatment_details')
            ->withPivot('jumlah_obat');
    }
}
