<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ConfirmationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'method_id',
        'code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function method()
    {
        return $this->belongsTo(ConfirmationMethod::class);
    }
}
