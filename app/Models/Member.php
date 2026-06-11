<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'nim',
        'name',
        'email',
        'address',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
