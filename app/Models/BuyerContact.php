<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerContact extends Model
{
    use HasFactory;

    protected $table = 'buyer_contacts';

    protected $fillable = [
        'property_type',
        'property_id',
        'seller_id',
        'buyer_name',
        'email',
        'mobile',
        'agree_to_contact',
    ];
}
