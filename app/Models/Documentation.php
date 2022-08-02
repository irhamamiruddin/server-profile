<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Documentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url'
    ];

    protected $is_member = false;

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => now()->parse($value)->format('d/m/y H:i a'),
        );
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });
    }

    public function isMember():Attribute
    {
        return new Attribute(
            get: fn ($value) => $value,
            set: fn ($value) => $value,
        );
    }

}
