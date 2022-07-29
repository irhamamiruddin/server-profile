<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Server extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'domain',
        'environment',
        'ip_address',
        'port',
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

    /**
     * Get all of the applications for the Server
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
        return $this->hasManyThrough(ActivityType::class, ServerActivity::class);
    }

    /**
     * Get the application_detail associated with the Server
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function application_detail()
    {
        return $this->hasOne(ApplicationDetail::class);
    }

    // Accessors
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    // Scope
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('domain','like','%' . $search . '%')
                        ->orWhere('status','like','%' . $search . '%');
            });
        });
    }
}
