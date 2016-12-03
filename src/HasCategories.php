<?php

/*
 * This file is part of Laravel Categorizable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel Categorizable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Categorizable;

use Illuminate\Database\Eloquent\Model;

trait HasCategories
{
    /**
     * @return mixed
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categories_relations');
    }

    /**
     * @return mixed
     */
    public function categoriesList()
    {
        return $this->categories()
                    ->lists('name', 'id')
                    ->toArray();
    }

    /**
     * @param $categories
     */
    public function categorize($categories)
    {
        foreach ($categories as $category) {
            $this->addCategory($category);
        }
    }

    /**
     * @param $categories
     */
    public function uncategorize($categories)
    {
        foreach ($categories as $category) {
            $this->removeCategory($category);
        }
    }

    /**
     * @param $categories
     */
    public function recategorize($categories)
    {
        $this->categories()->sync([]);

        $this->categorize($categories);
    }

    /**
     * @param Model $category
     */
    public function addCategory(Model $category)
    {
        if (!$this->categories->contains($category->getKey())) {
            $this->categories()->attach($category);
        }
    }

    /**
     * @param Model $category
     */
    public function removeCategory(Model $category)
    {
        $this->categories()->detach($category);
    }
}
