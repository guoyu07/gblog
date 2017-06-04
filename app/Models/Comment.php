<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Comment's Post
     * 
     * @return BeLOngsTo
     */
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    /**
     * Comment's Category
     * 
     * @return BeLOngsTo
     */
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    /**
     * Comment's User
     * 
     * @return BeLongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
