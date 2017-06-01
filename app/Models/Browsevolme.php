<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Browsevolme extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'browsevolme';

    protected $fillable = [];

    /**
     * Browse Volme
     * 
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
