<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Customer extends Model
{

    protected $fillable = 
    [
    'last_name',
    'middle_name',
    'first_name',
    'birthdate',
    'gender',
    'street',
    'block_lot',
    'city',
    'zipcode',
    'province',
    'email',
    'is_active',
    'phone_number',
    'start_pay',
    'date_joined'
    ];
}
