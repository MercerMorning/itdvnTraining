<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public $table = 'posts';

    protected $fillable = [
        'title', 'body', 'userId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
