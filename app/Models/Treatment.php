<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['turtle_type_id', 'title', 'body', 'views', 'created_at', 'updated_at', 'deleted_at'];

    public function turtleType()
    {
        return $this->belongsTo('App\Models\TurtleType');
    }
}
