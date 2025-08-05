<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['uuid', 'name', 'description', 'qr_location'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
