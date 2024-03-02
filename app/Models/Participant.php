<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Participant extends Pivot ///==> عشان دا pivot model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [ ///دا بيسمحلي اني احول الداتا تايب
        'joined_at'=>'datetime',
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
