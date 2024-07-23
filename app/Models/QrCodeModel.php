<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class QrCodeModel extends Model
{
    use HasFactory;

    protected $table= "qr_codes";

    protected $fillable= [
      'user_id',  'qr_code_string',  'qr_code_path'
    ];

    public function user() {
      //the qr_code belongs to the user 1:1
      return  $this->belongsTo(User::class, 'user_id');
    }

    /* Accessor to get the QR code path directly
    public function getQrCodePathAttribute()
    {
        return $this->qrCode ? $this->qrCode->qr_code_path : null;
    }*/
}
