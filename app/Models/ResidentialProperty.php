<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialProperty extends Model
{
    use HasFactory;

    // Table name (optional if following Laravel convention)
    protected $table = 'residential_properties';

    // Mass-assignable fields
    protected $fillable = [
        'location_id',
        'property_type',
        'user_id',
        'want_for',
        'poss_status',
        'plot_area',
        'plot_area_unit',
        'super_area',
        'super_area_unit',
        'bedrooms',
        'balconies',
        'total_rooms',
        'total_floor',
        'furnished_status',
        'bathrooms',
        'open_sides',
        'w_road_facing',
        'w_road_facing_unit',
        'leased_out',
        'property_price',
    ];

    // Relationship: ResidentialProperty belongs to a Location
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
