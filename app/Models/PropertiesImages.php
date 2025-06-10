<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesImages extends Model
{
    use HasFactory;

     protected $table = 'properties_images';

    protected $fillable = [
        'location_id',
        'image',
    ];

    // Optional: If you want to define relationship with Location model
    public function location()
    {
     return $this->belongsTo(Locations::class);
    }

    
}
