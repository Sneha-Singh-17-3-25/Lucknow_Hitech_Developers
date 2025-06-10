<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotLandProperty extends Model
{
    use HasFactory;


    protected $fillable = [
        'location_id',
        'user_id',
        'property_type',
        'want_for',
        'poss_status',
        'no_open_sides',
        'w_road_facing',
        'w_road_facing_unit',
        'corner_plot',
        'const_plot',
        'boundary_wall_made',
        'plot_area',
        'plot_area_unit',
        'plot_land_length',
        'plot_land_length_unit',
        'plot_land_breath',
        'plot_land_breath_unit',
        'leased_out',
        'property_price',
    ];

    public function location()
    {
        return $this->belongsTo(Locations::class);
    }

     public function firstImage()
    {
        return $this->hasOne(PropertiesImages::class, 'location_id', 'location_id')->latest();
    }
}
