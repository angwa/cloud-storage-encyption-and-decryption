<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table="storages";
    protected $fillable =['user_id','name','file','hash','type'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
