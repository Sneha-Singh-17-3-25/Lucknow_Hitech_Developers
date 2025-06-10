<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    // Table name (optional if following Laravel naming convention)
    protected $table = 'locations';

    // Fillable fields for mass assignment
    protected $fillable = [
        'pincode',
        'city',
        'state',
        'address',
    ];
}
