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

    //QueryScope
    public function scopeFilter($query, $filters){
        $query->when( $filters['search'] ?? null, function($query, $search){
            $query->where('first_name', 'LIKE', '%' . $search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                ->orWhere('city', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%')
                ->orWhereHas('organization', function($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                } );
        });
    }
}


