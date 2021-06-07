<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    protected $fillable = 
    [
    'user_type_name',
    ];
}
