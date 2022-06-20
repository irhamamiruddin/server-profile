<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'nature',
    ];

    // Relationship Declaration
    public function servers()
    {
        return $this->belongsToMany(Server::class);
    }

    // Accessor
    protected function nature(): Attribute
    {
        return new Attribute(
			get: fn ($value) => $value."MP"
        );
    }
}
