<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Scans extends Model
{
    use HasFactory;

    protected $table= 'scans';

    protected $fillable = [
        'qr_code_string','user_id','status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
