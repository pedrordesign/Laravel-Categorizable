<?php

namespace BrianFaust\Categorizable\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Kalnoy\Nestedset\Node;

class Category extends Node implements SluggableInterface
{
    use SluggableTrait;

    /**
     * @var array
     */
    protected $sluggable = ['build_from' => 'name'];

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
}
