<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'last_message_id',
    ];

    public function participants()
    {
        return $this->belongsToMany(User::class,'participants')->withPivot([
            'joined_at','role' ////عشان اعرف هو دخل امتي وهو ادمن ولا لا
        ]);
    }

    public function messages()
    {
        return $this->hasMany(Message::class,'chat_id','id')->latest();  ///عايز ارجع الرسايل مترتبه حسب الcreated at
    }

    ///function to creator
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function lastMessage()
    {
        return $this->belongsTo(Message::class,'last_message_id','id')->withDefault();
    }
}
