<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['chat_room_id','message','is_seen','type','is_file','file_type','file'];

    public function chatRoom(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ChatRoom::class,'chat_room_id');
    }

    public function scopeSeen($query)
    {
        return $query->where('is_seen',0);
    }

    public function scopeUnseen($query)
    {
        return $query->where('is_seen',1);
    }

    public function scopeSender($query)
    {
        return $query->where('type',1);
    }

    public function scopeReceiver($query)
    {
        return $query->where('type',2);
    }
}
