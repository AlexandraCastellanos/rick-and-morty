<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $table = 'characters';
    protected $fillable = ['api_id', 'name', 'status', 'species', 'type', 'gender', 'name_origin', 'url_origin', 'image'];
}
