<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ServerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'operating_system',
        'vcpu_amount',
        'memory',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    protected function memory(): Attribute
    {
        return new Attribute(
			get: fn ($value) => $value." GB"
        );
    }
}
