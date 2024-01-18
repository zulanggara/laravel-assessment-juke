<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'phone_number',
        'email_address',
        'province_address',
        'city_address',
        'street_address',
        'zip_code',
        'ktp_number',
        'bank_account',
        'bank_account_number',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
