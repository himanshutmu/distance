<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];
   
    public static function getOrigin() {
        return Address::where('is_headquarter',1)->value('address');
    }

    public static function getDestinations() {
        return Address::where('is_headquarter', 0)->pluck('address')->toArray();
    }
}
