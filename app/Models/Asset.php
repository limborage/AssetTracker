<?php

namespace App\Models;

use App\Http\Enums\AssetStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'serial_number',
        'status'
    ];

    protected $casts = [
        'status' => AssetStatus::class
    ];

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }

    public function latestThreeInspections(): HasMany
    {
        return $this->inspections()->latest()->limit(3);
    }
}
