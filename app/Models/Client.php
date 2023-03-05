<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'full_name',
        'email',
        'password',
        'phone_number',
        'property',
    ];
    public $sortable =  [
        
        'full_name',
        'email',
        'password',
        'phone_number',
        'property',
    ];
}


