<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialProperty extends Model
{
    use HasFactory;

    protected $table = 'commercial_properties';

    protected $fillable = [
        'location_id',
        'user_id',
        'property_type',
        'want_for',
        'poss_status',
        'plot_area',
        'plot_area_unit',
        'super_area',
        'super_area_unit',
        'floor_no',
        'total_floor',
        'furnished_status',
        'washrooms',
        'per_washrooms',
        'pantry_cafeteria',
        'leased_out',
        'property_price',
    ];

    // Relationship with Location model (assuming it exists)
    public function location()
    {
        return $this->belongsTo(Locations::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function firstImage()
    {
        return $this->hasOne(PropertiesImages::class, 'location_id', 'location_id')->latest();
    }

    public function multipleImage()
    {
        return $this->hasMany(PropertiesImages::class, 'location_id', 'location_id');
    }
}
