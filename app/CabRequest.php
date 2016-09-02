<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CabRequest extends Model
{
    //
protected $fillable = ['pickupLocation','destination','date','time'];

public function user()
    {
        return $this->belongsTo(User::class);
    }

}