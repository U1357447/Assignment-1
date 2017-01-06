<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['body', 'user_id'];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
