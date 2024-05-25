<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $fillable = ['property_id','user_id', 'message', 'is_read', 'added_by', 'status'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
