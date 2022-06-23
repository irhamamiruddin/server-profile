<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'version',
        'ports',
        'health_status',
        'health_last_checked',
        'status',
    ];

    // Relationship Declarations
    public function application_detail()
    {
        return $this->belongsTo(ApplicationDetail::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

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
