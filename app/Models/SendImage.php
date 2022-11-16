<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendImage extends Model
{
    use HasFactory;

    protected $table = 'send_images';

    protected $fillable = [
        'image',
    ];

}
