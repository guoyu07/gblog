<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Star extends Model implements Transformable
{
    use TransformableTrait;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'star';

    protected $fillable = [];

    /**
     * Star's Post
     * 
     * @return BeLongsTo
     */
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

     /**
     * Star's User
     * 
     * @return BeLongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
