<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $table='publication';
    protected $primaryKey="id";
    protected $fillable=[

        'id',
        'titre',
        'libele',
        'description',
        'edit_by',
        'add_by',
        'status',
        'deleted_by',
        'remember_token',
        'created_at',
        'updated_at',
        'is_deleted	',

    ];


}
