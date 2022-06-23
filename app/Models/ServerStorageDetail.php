<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerStorageDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'partition',
        'allocated_size',
        'unit',
        'remarks',
        'status',
    ];

    /**
     * Get the server_detail that owns the ServerStorageDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function server_detail(): BelongsTo
    {
        return $this->belongsTo(ServerDetail::class, 'server_detail_id');
    }
}
