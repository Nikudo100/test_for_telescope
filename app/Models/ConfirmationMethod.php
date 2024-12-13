<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ConfirmationMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'method',
    ];

    public function codes()
    {
        return $this->hasMany(ConfirmationCode::class);
    }
}