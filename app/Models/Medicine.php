<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_obat',
        'satuan',
        'stok'
    ];
    public function treatments(): BelongsToMany
    {
        return $this->belongsToMany(Treatment::class, 'treatment_details')
            ->withPivot('jumlah_obat');
    }
}
