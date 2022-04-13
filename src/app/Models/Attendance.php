<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['user_id', 'entry_ip', 'entry_time', 'entry_location','created_at','updated_at'];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
