<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModuleLog extends Model
{
    use HasFactory;

    protected $fillable = ['module_id', 'status', 'timestamp'];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
