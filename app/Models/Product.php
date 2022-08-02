<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type', 'description', 'capacity'];

    public function clients()
    {
        return $this->belongsToMany(Client::class,'bookings');
    }
}
