<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'image_path', 'title', 'body', 'created_at', 'updated_at'];
    
    /**
     * Transform every file paths into URL
     * 
     * @return void
     */
    public function transformPath()
    {
        $imagePath = $this->image_path;
        $adminUrl = env('ADMIN_URL');

        if (isset($imagePath)) $this->image = "{$adminUrl}/storage/{$imagePath}";
        else $this->image = null;

        unset($this->image_path);
    }
}
