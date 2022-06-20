<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'v_technology',
        'config_file',
    ];

    // Relationship
    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
