<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path'
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
