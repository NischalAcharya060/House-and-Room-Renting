<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'location',
        'map_coordinates',
        'image_url',
        'price',
        'property_type',
        'property_owner',
        'property_owner_phone_no',
        'status',
        'kitchen',
        'bedrooms',
        'bathrooms',
        'toilets',
        'rooms',
        'submitted_by',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
