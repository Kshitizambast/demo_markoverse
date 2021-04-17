<?php

namespace App\Search;
use App\Product;
use App\MyShop;
use App\Category;

use Algolia\ScoutExtended\Searchable\Aggregator;

class SiteWideSearch extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        Product::class,
        MyShop::class,
        Category::class,
    ];


    public function shouldBeSearchable()
    {
        // Check if the class uses the Searchable trait before calling shouldBeSearchable
        if (array_key_exists(Searchable::class, class_uses($this->model))) {
            return $this->model->shouldBeSearchable();
        }
    }
}
