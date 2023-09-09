<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $table = 'posts';
    protected $fillable = array('title','author','image','short_desc','description');

    public function categories() {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
