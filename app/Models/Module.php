<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'module_type_id', 'status', 'operation_duration', 'data_sent_count'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ModuleType::class, 'module_type_id', 'id');
    }

    public function data(): HasMany
    {
        return $this->hasMany(ModuleData::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(ModuleLog::class);
    }
}
