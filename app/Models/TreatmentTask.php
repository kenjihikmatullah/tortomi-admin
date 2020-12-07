<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TreatmentTask extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['treatment_id', 'title', 'body', 'created_at', 'updated_at', 'deleted_at'];

    public function treatment()
    {
        return $this->belongsTo('App\Models\Treatment');
    }
}
