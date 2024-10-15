<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table='rating';
    protected $primaryKey="id";
    protected $fillable=[

        'id',
        'user_id',
        'pub_id',
        'note',
        'created_at',
        'updated_at',

    ];
}
