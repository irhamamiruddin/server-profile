<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'applications';
	protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'version',
        'ports',
        'health_status',
        'health_last_checked',
        'status',
        'server_id',
        'application_detail_id',
    ];


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


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->whereHas('server',function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })

            ->orWhere(function($query) use ($search) {
                $query->where('name','like','%' . $search . '%')
                    ->orWhere('status','like','%' . $search . '%');
            });
        });
    }
}
