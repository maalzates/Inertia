<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Organization;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'organization_id', 'email', 'phone', 'address', 'city', 'state', 'country_id', 'postal_code'];

    public function  country(){

        return $this->belongsTo(Country::class);
    }

    public function  organization(){

        return $this->belongsTo(Organization::class);
    }

}


