<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function links()
    {
    return $this->hasMany(Link::class);
    }
}
