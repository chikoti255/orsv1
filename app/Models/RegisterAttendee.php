<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QrCodeModel;
use App\Models\Scans;

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


    public function qrCode() {
      return $this->hasOne(QrCodeModel::class, 'attendee_id');
    }

    public function scans() {
      return $this->hasOne(Scans::class, 'attendee_id','id');
    }

}
