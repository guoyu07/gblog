<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Collections extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collections';

    protected $fillable = [];

    /**
     * Collection User
     * 
     * @return BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Collention Post
     * 
     * @return BeLongsTo
     */
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

}
