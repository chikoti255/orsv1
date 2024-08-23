<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegisterAttendee;


class Scans extends Model
{
    use HasFactory;

    protected $table= 'scans';

    protected $fillable = [
        'qr_code_string','attendee_id','status'
    ];

    public function attendee() {
        return $this->belongsTo(RegisterAttendee::class, 'attendee_id');
    }
}
