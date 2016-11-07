<?php

namespace BrianFaust\Categorizable;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Kalnoy\Nestedset\Node;

class Category extends Node
{
    use HasSlug;

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return mixed
     */
    public function categorizable()
    {
        return $this->morphTo();
    }

    /**
     * @param $class
     *
     * @return mixed
     */
    public function entries($class)
    {
        return $this->morphedByMany($class, 'categorizable', 'categories_relations');
    }

    /**
     * @return mixed
     */
    public static function tree()
    {
        return static::get()->toTree()->toArray();
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
