<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'environment',
        'ip_address',
        'port',
        'dns',
        'status',
    ];

    // Relationship declarations
    public function server_details()
    {
        return $this->hasOne(ServerDetail::class);
    }

    public function documentations()
    {
        return $this->hasMany(Documentation::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * Get all of the activities for the Server
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany(ServerActivity::class);
    }

    // Accessors
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
}
