<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers';
	protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'version',
        // 'ports',
        'health_status',
        'health_last_checked',
        'status',
    ];

    // Accessor
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    protected function healthStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    protected function healthLastChecked(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => now()->parse($value)->diffForHumans(),
        );
    }
}
