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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the type associated with the ServerActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        dd($this->hasOne(ActivityType::class));
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
    public function getCreatedAtAttribute($value)
    {
        return now()->parse($value)->format('d/m/Y, H:i a');
    }
}
