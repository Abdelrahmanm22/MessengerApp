<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'chat_id',
        'user_id',
        'body',
        'type',
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
    ///function to sender
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name'=>__('User')  ///عشان لو اتشال من الشات يظهر بالاسم دا
        ]);
    }

    ///function to recipients
    public function recipients()
    {
        return $this->belongsToMany(User::class,'recipients')
            ->withPivot([
                'read_at','deleted_at'   ////عشان اعرف هو شاف المسدج امتي او مسحها امتي
            ]);
    }
}
