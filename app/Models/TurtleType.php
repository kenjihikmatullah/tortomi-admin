<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TurtleType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image_path', 'name', 'description', 'created_at', 'updated_at'];
}
