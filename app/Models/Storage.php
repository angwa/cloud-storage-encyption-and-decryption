<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table="storages";
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
