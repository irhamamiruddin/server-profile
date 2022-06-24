<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ServerActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relationship

    /**
     * Get the user associated with the ServerActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the type that owns the ServerActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ActivityType::class,'activity_type_id');
    }

    /**
     * Get the server that owns the ServerActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    // Accessor
    // public function getCreatedAtAttribute($value)
    // {
    //     return now()->parse($value)->format('d/m/Y, H:i a');
    // }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => now()->parse($value)->format('d/m/Y, H:i a'),
        );
    }

    // Scope
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->whereHas('user',function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
            })

            ->orWhereHas('type',function($query) use ($search) {
                $query->where('name','like','%' . $search . '%')
                        ->orWhere('description','like','%' . $search . '%');
            })

            ->orWhereHas('server',function($query) use ($search) {
                $query->where('name','like','%' . $search . '%');
            })

            ->orWhere(function($query) use ($search) {
                $query->where('created_at','like','%' . $search . '%');
            });
        });
    }
}
