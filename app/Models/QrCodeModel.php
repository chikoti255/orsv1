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
      'id','user_id','qr_code','email','qr_code_image'
    ];

    public function qrcode() {
      //the qr_code belongs to the user 1:1
      $this->belongsTo(User::class);
    }
}
