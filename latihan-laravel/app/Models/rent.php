<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    public function rent_user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }


    public function rent_book()
    {
        return $this->belongsTo(Post::class, 'BukuID');
    }
}
