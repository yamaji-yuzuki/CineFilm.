<?php
//別でchatモデルを作るため、chatsテーブルに関するモデルではあるがRoomモデル
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
   protected $table = 'chats';

   public function messages()
    {
        return $this->hasMany(Message::class);
    }
}