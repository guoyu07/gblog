<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'isstart',
    ];

    /**
     * Post's Category
     * 
     * @return BelongsTo
     */
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    /**
     * Post's user
     * 
     * @return BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo(User::class);	
    }

    /**
     * Browse NUM
     * 
     * @return HasOne
     */
    public function browsevolme()
    {
    	return $this->hasOne(Browsevolme::class);
    }

    /**
     * Collections
     * 
     * @return HasMany
     */
    public function collections()
    {
    	return $this->hasMany(Collections::class);
    }

    /**
     * Star
     * 
     * @return HasMany
     */
    public function stars()
    {
    	return $this->hasMany(Star::class);
    }

    /**
     * Posr's Comments
     * 
     * @return HasMany
     */
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
