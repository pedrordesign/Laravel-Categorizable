<?php

/*
 * This file is part of Laravel Categorizable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Categorizable\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface HasCategories
{
    /**
     * @return mixed
     */
    public function categories();

    /**
     * @return mixed
     */
    public function categoriesList();

    /**
     * @param $categories
     *
     * @return mixed
     */
    public function categorize($categories);

    /**
     * @param $categories
     *
     * @return mixed
     */
    public function uncategorize($categories);

    /**
     * @param $categories
     *
     * @return mixed
     */
    public function recategorize($categories);

    /**
     * @param Model $category
     *
     * @return mixed
     */
    public function addCategory(Model $category);

    /**
     * @param Model $category
     *
     * @return mixed
     */
    public function removeCategory(Model $category);
}
