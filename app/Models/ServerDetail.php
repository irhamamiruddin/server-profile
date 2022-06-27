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

    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucfirst($value)
        );
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }


    /**
     * Get all of the storage_detail for the ServerDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storage_details()
    {
        return $this->hasMany(ServerStorageDetail::class);
    }
}
