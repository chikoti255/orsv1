<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterAttendee extends Model
{
    use HasFactory;

    protected $table= 'registered_users';

    protected $fillable = [
        'full_name','email','organization','country',
        'comments','membership',
        'payment_slip','title','status',
        'confirm_payment','mobile_no'
    ];


}
