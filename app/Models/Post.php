<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    
// Userクラスのuse宣言
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    public function user() //1対多の関係なので単数系
    {
        return $this->belongsTo(User::class);
    }
        
    /*TODO：画像，位置情報の書き込みも追加*/
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];
}
